  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>


  </head>

  <body>
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h4>Tableaux des patients</h4>
                  <div class="table-responsive">
                      <table id="mytable" class="table table-bordred table-striped">
                          <thead>
                              <th><input type="checkbox" id="checkall" /></th>
                              <th>Nom</th>
                              <th>Prenom</th>
                              <th>Address</th>
                              <th>Telefone</th>
                              <th>Genre</th>
                              <th>Date de Naissance</th>
                              <th>Edit</th>
                              <th>Delete</th>
                          </thead>
                          {{--  @foreach ($data as $item)  --}}
                            
                         
                          <tbody>
                              <tr>
                                  <td><input type="checkbox" class="checkthis" /></td>
                                  {{--  <td>{{$item->nomPatient}}</td>  --}}
                                  {{--  <td>{{$item->prenomPatient}}</td>  --}}  
                                  <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
                                  <td>isometric.mohsin@gmail.com</td>
                                  <td>+923335586757</td>
                                  <td>
                                      <p data-placement="top" data-toggle="tooltip" title="Edit"><button
                                              class="btn btn-primary btn-xs" data-title="mymodeledit"
                                              data-toggle="modal" data-target="#mymodeledit"><span
                                                  class="glyphicon glyphicon-pencil"></span></button></p>
                                  </td>
                                  <td>
                                      <p data-placement="top" data-toggle="tooltip" title="Delete"><button
                                              class="btn btn-danger btn-xs" data-title="mymodeldelete"
                                              data-toggle="modal" data-target="#mymodeldelete"><span
                                                  class="glyphicon glyphicon-trash"></span></button></p>
                                  </td>
                              </tr>
                          </tbody> 
                          {{--  @endforeach  --}}
                      </table>

                      <div class="clearfix"></div>
                      <ul class="pagination pull-right">
                          <li class="disabled"><a href="#"><span
                                      class="glyphicon glyphicon-chevron-left"></span></a></li>
                          <li class="active"><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                      </ul>

                  </div>

              </div>
          </div>
      </div>


      <div class="modal fade" id="mymodeledit" tabindex="-1" role="dialog" aria-labelledby="mymodeledit"
          aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                              class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                      <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                  </div>
                  <div class="modal-body">
                          <form class="shadow p-3 mb-5 bg-body rounded" method="Post" action="">
                              @csrf
                  
                              <div class="row mb-3">
                                  <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                                  <div class="col-sm-3">
                                      <input type="text" class="form-control shadow-sm" id="nom" name="nomPatient" required>
                                  </div>
                                  <label for="prenom" class="col-sm-2 col-form-label">Prénom :</label>
                                  <div class="col-sm-3">
                                      <input type="text" class="form-control shadow-sm" id="prenom" name="prenomPatient" required>
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <label for="adress" class="col-sm-2 col-form-label">Adress :</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control shadow-sm" id="adressPatient" name="adressPatient" required>
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <label for="telefonePatient" class="col-sm-2 col-form-label">telefone :</label>
                                  <div class="col-sm-3">
                                      <input type="text" class="form-control shadow-sm" id="telefonePatient" name="telefonePatient" required>
                                  </div>
                                  <label for="sex" class="col-sm-2 col-form-label">Sex :</label>
                                  <div class="col-sm-3 form-group">
                                      <select class="form-select" aria-label="Default select example" id="sexePatient" name="sexePatient">
                                          <option value="madame">Madame</option>
                                          <option value="monsieur">Monsieur</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <label for="dateNaissancePatient" class="col-sm-2 col-form-label">date de naissance :</label>
                                  <div class="col-sm-10">
                                      <input type="date" class="form-control shadow-sm" id="dateNaissancePatient" name="dateNaissancePatient" required>
                                  </div>
                              </div>
                              <div class="row mb-3">
                                  <label for="adress" class="col-sm-2 col-form-label">cin :</label>
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control shadow-sm" id="cin" name="cin" required>
                                  </div>
                              </div>
                              <div class="model-footer">
                                  {{--  <button type="submit"   class="btn btn-primary">Ajouter</button>  --}}
                                  <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span
                                    class="glyphicon glyphicon-ok-sign"></span> Update</button>
                              </div>
                          </form>
                        </div>
                      </div>
                  </div>







                  </div>
                  {{--  <div class="modal-footer ">
                      <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span
                              class="glyphicon glyphicon-ok-sign"></span> Update</button>
                  </div>  --}}
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>



      <div class="modal fade" id="mymodeldelete" tabindex="-1" role="dialog" aria-labelledby="edit"
          aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                              class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                      <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                  </div>
                  <div class="modal-body">

                      <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you
                          sure you want to delete this Record?</div>

                  </div>
                  <div class="modal-footer ">
                      <button type="button" class="btn btn-success"><span
                              class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal"><span
                              class="glyphicon glyphicon-remove"></span> No</button>
                  </div>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>


  </body>

  </html>
