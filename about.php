<h1 class="h3 mb-4 text-gray-800">Dataset</h1>

<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="card-title">List Dataset</h4>
                    <div data-toggle="modal" data-target="#myModal" onclick="ClearScreen();">
                        <button class="btn btn-outline-info btn-sm btn-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataset" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Chat</th>
                                <th>Respon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle" aria-hidden="true">Fill Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <form method="POST" action="#">
                <div class="modal-body">
                    <div id="error_add"></div>

                    <div class="row flex-row justify-content-center">
                        <input type="text" id="Id" class="form-control" hidden>
                        <div class="form-group col-lg-6">
                            <label class="placeholder">Pertanyaan</label>
                            <input type="text" class="form-control" id="ask" required="" placeholder="Input Ask">
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="placeholder">Respon</label>
                            <input type="text" class="form-control" id="respon" required="" placeholder="Input Respon">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" id="add" class="btn btn-outline-success" value="Save" data-dismiss="modal" onclick="Save();">
                    <input type="button" id="upd" class="btn btn-outline-warning" value="Update" data-dismiss="modal" onclick="Upd();">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var table = null;
    var arrData = [];

    $(document).ready(function(){
        // $.ajax({
        //     dataType: "JSON",
        //     type: 'POST',
        //     url: 'aboutProses.php',
        //     data: { 
        //         sent: "id",
        //         id: 26,
        //     },
        //     success: function(result){
        //         debugger;
        //         console.log(result);
        //         if (result.statusCode == true) {
        //             Swal.fire({
        //                 position: 'center',
        //                 icon: 'success',
        //                 title: 'Delete Successfully',
        //                 showConfirmButton: false,
        //                 timer: 1500,
        //             });
        //             $('#dataset').ajax.reload(null, false);
        //         } else {
        //             Swal.fire('Error', 'Failed to Delete', 'error');
        //             ClearScreen();
        //         }
        //     }
        // });
        // $('#dataset').DataTable();
        table = $('#dataset').DataTable({
            "processing": true,
            "responsive": true,
            "pagination": true,
            "stateSave": true,
            "ajax": {
                type: "POST",
                url: "aboutProses.php",
                dataType: "json",
                data: {
                    "sent": "all"
                },
                dataSrc: ""
            },
            "columns": [
                {
                    'render': function (data, type, row, meta) {
                        // console.log(meta.row);
                        return meta.row + 1;
                    }
                },
                { 'data': 'ask' },
                { 'data': 'respon' },
                {
                    "sortable": false,
                    "render": function (data, type, row, meta) {
                        // console.log(meta.row);
                        $('[data-toggle="tooltip"]').tooltip();
                        return '<div class="form-button-action">'
                            + '<button class="btn btn-outline-warning btn-sm btn-circle" data-placement="left" data-toggle="tooltip" data-animation="false" title="Edit" onclick="return GetById(' + meta.row + ')" ><i class="fas fa-lg fa-edit"></i></button>'
                            + '&nbsp;'
                            + '<button class="btn btn-outline-danger btn-sm btn-circle" data-placement="right" data-toggle="tooltip" data-animation="false" title="Delete" onclick="return Del(' + meta.row + ')" ><i class="fas fa-lg fa-trash-alt"></i></button>'
                            + '</div>'
                    }
                }
            ],
        });
    });

    function ClearScreen() {
        $('#Id').val('');
        $('#ask').val('');
        $('#respon').val('');
        $('#upd').hide();
        $('#add').show();
    }


    function GetById(number) {
        // debugger;
        var getid = table.row(number).data().id;
        console.log(getid);
        $.ajax({
            url: "aboutProses.php",
            type: 'POST',
            dataType: "JSON",
            data: { 
                sent: "id",
                id: getid,
            }
        }).then((res) => {
            // debugger;
            // var data = JSON.parse(res);
            console.log(res);
            $('#Id').val(res.id);
            $('#ask').val(res.ask);
            $('#respon').val(res.respon);
            $('#add').hide();
            $('#upd').show();
            $('#myModal').modal('show');
        });
    }

    function Save() {
        // debugger;
        var Data = new Object();
        Data.sent = 'add';
        Data.ask = $('#ask').val();
        Data.respon = $('#respon').val();
        $.ajax({
            cache: false,
            url: "aboutProses.php",
            type: 'POST',
            dataType: "JSON",
            data: Data
        }).then((result) => {
            // debugger;
            if (result.statusCode == true) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Data inserted Successfully',
                    showConfirmButton: false,
                    timer: 1500,
                })
                table.ajax.reload(null, false);
            } else {
                Swal.fire('Error', 'Failed to Input', 'error');
                ClearScreen();
            }
        })
    }

    function Upd() {
        // debugger;
        var Data = new Object();
        Data.sent = 'upd';
        Data.id = $('#Id').val();
        Data.ask = $('#ask').val();
        Data.respon = $('#respon').val();
        $.ajax({
            cache: false,
            url: "aboutProses.php",
            type: 'POST',
            dataType: "JSON",
            data: Data
        }).then((result) => {
            // debugger;
            if (result.statusCode == true) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: result.msg,
                    showConfirmButton: false,
                    timer: 1500,
                });
                table.ajax.reload(null, false);
            } else {
                Swal.fire('Error', result.msg, 'error');
                ClearScreen();
            }
        })
    }

    function Del(number) {
        // debugger;
        var getid = table.row(number).data().id;
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((resultSwal) => {
            if (resultSwal.value) {
                // debugger;
                var Data = new Object();
                Data.sent = 'del';
                Data.id = getid;
                $.ajax({
                    type: 'POST',
                    url: "aboutProses.php",
                    cache: false,
                    dataType: "JSON",
                    data: Data,
                }).then((result) => {
                    // debugger;
                    console.log(result);
                    if (result.statusCode == true) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Delete Successfully',
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        table.ajax.reload(null, false);
                    } else {
                        Swal.fire('Error', 'Failed to Delete', 'error');
                        ClearScreen();
                    }
                });
            };
        });
    }
</script>