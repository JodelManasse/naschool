
@extends('test', ['title' => __('User Profile')])

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                            </i>
                    </div>
                    <div>Acceuil
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Femme Suivies</div>
                            <div class="widget-subheading"></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{ count(\App\model\suivis::where('idmed',auth()->user()->personne->medecin->idmed )->get()) }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Grossesse á Terme</div>
                            <div class="widget-subheading"></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{ count(\App\model\suivis::where('terme', '')->get()) }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Grossesse á risque</div>
                            <div class="widget-subheading"></div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{ count(\App\model\suivis::where('etat', 'risque')->get()) }}</span></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Femme Suivies
                        <div class="btn-actions-pane-right">

                        </div>
                    </div>
                    <div class="table-responsive">
                        <form action="{{ route('gros') }}" method="POST"  name="formSaisie">
                            {{ csrf_field() }}
                            {!! Form::hidden('route','', ['class' => 'form-control' ,"id"=>"route"]) !!}
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Nom</th>
                                    <th class="text-center">Adresse</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (auth()->user()->personne->medecin->suivis as $suivi)
                                <tr>
                                    <td>
                                        {!! Form::radio('idsuiv',  $suivi->idsuiv, ['class' => 'form-control-label']) !!}
                                    </td>

                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img width="40" class="rounded-circle" src="{{ asset('images') }}/{{ $suivi->personne->image}}" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"></div>
                                                    <div class="widget-subheading opacity-7"> {{ $suivi->personne->nom }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $suivi->personne->adresse }}</td>
                                    <td class="text-center">
                                        <div class="badge badge-warning">Pending</div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    <div class="d-block text-center card-footer">
                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                        <button class="btn-wide btn btn-success">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

    </div>
    @endsection
    <script type="text/javascript">
        //<![CDATA[

        function valider(route) {
          // si la valeur du champ prenom est non vide
          if(document.formSaisie.idsuiv.value != "") {
            document.getElementById('route').value =route;
           document.formSaisie.submit();
          }
          else {
            // sinon on affiche un message
            alert("Saisissez le prénom");
          }
        }

        //]]>
        </script>
