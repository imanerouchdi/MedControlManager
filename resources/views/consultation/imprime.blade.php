@extends('layouts.app-first')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header ">
                      <a class="btn btn-danger rounded-4 " type="submit" href="">imprime</a>
                        <h3 class="text-center">Billet de consultation</h3>

                        <div class="text-end mb-3">
                            <span
                                class="fw-bold me-2">{{ $consultation->dateCon }}</span><span>{{ $consultation->appointment->heureRdv }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row border-bottom mb-3 pb-3">
                            <div class="col-md-3">
                                <h5 class="fw-bold">Information Patient:</h5>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Nom:</label>
                                        <input type="text" class="form-control" name="nom"
                                            value=" {{ $consultation->patient->nomPatient }} ">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Prenom:</label>
                                        <input type="text" class="form-control" name="prenom"
                                            value=" {{ $consultation->patient->prenomPatient }} ">
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <label class="form-label">Téléphone:</label>
                                        <input type="tel" class="form-control" name="telephone"
                                            value=" {{ $consultation->patient->telefonePatient }} ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row border-bottom mb-3 pb-3">
                            <div class="col-md-3">
                                <h5 class="fw-bold">Information Rendez-Vous:</h5>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">Rendez-Vous le:</label>
                                        <input type="text" class="form-control" name="date_rendezvous"
                                            value=" {{ $consultation->appointment->dateRdv }} ">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Heure:</label>
                                        <input type="text" class="form-control" name="heure_rendezvous"
                                            value=" {{ $consultation->appointment->heureRdv }} ">
                                    </div>
                                    {{--  <div class="col-md-12 mt-3">
                                       
                                    </div>  --}}
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-start">
                          <div class="col-md-12 text-start">
                             <p class="fw-bold">Note:</p>
                                        <p class="fw-bold text-decoration-underline">Pour toute Annulation ou modification merci de prendre contact
                                            avec le bureau de rendez-vous</p>
                          </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-8 text-center">
                                <h4 class="fw-bold fs-3">Consultation et service:05673429</h4>
                                <hr class="my-3">
                                <p class="fw-bold mb-0">Merci de vous présenter à la caisse <span
                                        class="text-decoration-underline">30 min avant votre rendez-vous</span> accompagné
                                    de ce document.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <p class="fw-bold mb-0">Cachet du Service Rendez-vous</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    window.onload = function() { window.print(); }
</script>
@endsection