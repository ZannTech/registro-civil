<x-default-layout>
    <style>
        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #0C9;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float {
            margin-top: 22px;
        }
    </style>
    <div class="row">
        <div class="col-lg-12 px-4 py-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Lista de actas de {{ $name }} vigentes</h4>
                    <p class="card-text">Lista de las actas de {{ $name }} que se han registrado con todo el
                        historial de rectificaciones</p>
                </div>
                <div class="table-responsive mx-4">
                    <div class="table-responsive">
                        <table
                            class="table table-striped-columns
                    table-hover	
                    table-borderless
                    table-primary
                    align-middle">
                            @if ($type == 'acta_matrimonio')
                                <thead>
                                    <caption>Actas de matrimonio</caption>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre Mujer</th>
                                        <th>Nombre Hombre</th>
                                        <th>Fecha</th>

                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($data as $k => $d)
                                        <tr>
                                            <td>{{ $d->nro }}</td>
                                            <td>{{ $d->nombre_mujer }}</td>
                                            <td>{{ $d->nombre_hombre }}</td>
                                            <td>{{ $d->fecha_registro }}</td>
                                            <td>
                                                <button type="button" onclick="DeleteRow({{ $d->id }})"
                                                    class="btn btn-danger">Eliminar</button>
                                                <button onclick="ShowModal({{ $d->id }})" type="button"
                                                    class="btn btn-primary">Editar</button>

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                            @if ($type == 'acta_nacimiento')
                                <thead>
                                    <caption>Actas de Nacimiento</caption>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre</th>
                                        <th>Nombre Padre</th>
                                        <th>Nombre Madre</th>
                                        <th>Fecha</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($data as $k => $d)
                                        <tr>
                                            <td>{{ $d->nro }}</td>
                                            <td>{{ $d->nombre_completo }}</td>
                                            <td>{{ $d->nombre_padre }}</td>
                                            <td>{{ $d->nombre_padre }}</td>

                                            <td>{{ $d->fecha_registro }}</td>
                                            <td>
                                                <button type="button" onclick="DeleteRow({{ $d->id }})"
                                                    class="btn btn-danger">Eliminar</button>
                                                <button onclick="ShowModal({{ $d->id }})" type="button"
                                                    class="btn btn-primary">Editar</button>

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                            @if ($type == 'acta_defuncion')
                                <thead>
                                    <caption>Actas de Defunción</caption>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre</th>

                                        <th>Fecha</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($data as $k => $d)
                                        <tr>
                                            <td>{{ $d->nro }}</td>
                                            <td>{{ $d->nombre_completo }}</td>

                                            <td>{{ $d->fecha }}</td>
                                            <td>
                                                <button type="button" onclick="DeleteRow({{ $d->id }})"
                                                    class="btn btn-danger">Eliminar</button>
                                                <button onclick="ShowModal({{ $d->id }})" type="button"
                                                    class="btn btn-primary">Editar</button>

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="javascript:ShowModal();" class="float">
        <i class="fa fa-plus my-float"></i>
    </a>

    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modal_acta_matrimonio" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acta_title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frm_crud">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="type" value="{{ $type }}" name="type">

                        @if ($type == 'acta_nacimiento')
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Nombre Completo Nacido</label>
                                        <input type="text" class="form-control" name="nombre_completo"
                                            id="nombre_completo" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Nombre Completo Padre</label>
                                        <input type="text" class="form-control" name="nombre_padre" id="nombre_padre"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Nombre Completo Madre</label>
                                        <input type="text" class="form-control" name="nombre_madre" id="nombre_madre"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">UUID Acta</label>
                                        <input type="text" name="nro" class="form-control" readonly
                                            id="uuid" placeholder="">
                                    </div>
                                </div>
                            </div>
                            @endif @if ($type == 'acta_matrimonio')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Nombre Completo Mujer</label>
                                            <input type="text" class="form-control" name="nombre_mujer"
                                                id="nombre_mujer" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Nombre Completo Hombre</label>
                                            <input type="text" class="form-control" name="nombre_hombre"
                                                id="nombre_hombre" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">UUID Acta</label>
                                            <input type="text" name="nro" class="form-control" readonly
                                                id="uuid" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($type == 'acta_defuncion')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Nombre Completo</label>
                                            <input type="text" class="form-control" name="nombre_completo"
                                                id="nombre_completo" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">UUID Acta</label>
                                            <input type="text" name="nro" class="form-control" readonly
                                                id="uuid" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            @endif
                          

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script defer>
        function uuidv4() {
            return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
                (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
            );
        }

        $(function() {
            $("#uuid").val(uuidv4)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

        });
        const ShowModal = (id = '') => {
            $("#id").val(id)
            id != '' ? $.ajax({
                type: "POST",
                url: "/showDetail",
                data: {
                    id: id,
                    type: '{{ $type }}'
                },
                dataType: "json",
                success: function(response) {
                    @if ($type == 'acta_nacimiento')
                        $("#nombre_completo").val(response.nombre_completo)
                        $("#nombre_padre").val(response.nombre_padre)
                        $("#nombre_madre").val(response.nombre_madre)
                        $("#uuid").val(response.nro)
                    @endif
                    @if ($type == 'acta_defuncion')
                        $("#nombre_completo").val(response.nombre_completo)
                        $("#uuid").val(response.nro)
                    @endif
                    @if ($type == 'acta_matrimonio')
                        $("#nombre_mujer").val(response.nombre_mujer)
                        $("#nombre_hombre").val(response.nombre_hombre)
                        $("#uuid").val(response.nro)
                    @endif
                }
            }) : ''

            $("#modal_acta_matrimonio").modal('show')
        }
        $(document).ready(function() {
            $("#modal_acta_matrimonio").on('hidden.bs.modal', function() {
                @if ($type == 'acta_nacimiento')
                    $("#nombre_completo").val('')
                    $("#nombre_padre").val('')
                    $("#nombre_madre").val('')
                    $("#uuid").val('')
                @endif
                @if ($type == 'acta_defuncion')
                    $("#nombre_completo").val('')
                    $("#uuid").val('')
                @endif
                @if ($type == 'acta_matrimonio')
                    $("#nombre_mujer").val('')
                    $("#nombre_hombre").val('')
                    $("#uuid").val('')
                @endif
            })
        });
        const DeleteRow = (id) => {
            const data = {
                type: '{{ $type }}',
                id: id
            }
            $.ajax({
                type: "POST",
                url: "/deleteRow",
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Correcto',
                            html: response.message,
                            icon: 'success'
                        }).then(() => {
                            window.location.reload();
                        })
                    }
                }
            });
        }
        $(function() {
            $("#frm_crud").on("submit", (e) => {
                e.preventDefault();
                console.log('a')
                const serial = $("#frm_crud")[0]
                var data = new FormData(serial);
                $.ajax({
                    type: "POST",
                    url: "/crud",
