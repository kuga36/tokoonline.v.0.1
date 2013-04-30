<?php $this->load->view('main/header');?>
       <div class="container-fluid">
        <div class="row-fluid">
            <div id="" class="brand span12">
                    <h1 class="">pemesanan Management</h1>
            </div>
            <div class="span3">
                <div id="form_input" class="">
                <?php if(!empty($pemesanan)){ echo var_dump($pemesanan);}?>
                <?php echo form_open('pemesanan/submit',array('id'=>'addform','class'=>'form form-vertical')); ?>
                    
                    <input type="hidden" value='' id="idpesanan" name="idpesanan">
                    
                    <div class="control-group">
                            <?php echo form_label('idproduk : ','idproduk',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('idproduk','','id="idproduk"'); ?>
                            </div>
                    </div>
                    
                    <div class="control-group">
                            <?php echo form_label('NamaPemesan : ','NamaPemesan',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('NamaPemesan','','id="NamaPemesan"'); ?>
                            </div>
                    </div>
                    
                    <div class="control-group">
                            <?php echo form_label('JumlahPesan : ','JumlahPesan',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('JumlahPesan','','id="JumlahPesan"'); ?>
                            </div>
                    </div>
                    
                    <div class="control-group">
                            <?php echo form_label('Alamat : ','Alamat',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('Alamat','','id="Alamat"'); ?>
                            </div>
                    </div>
                    
                    <div class="control-group">
                            <?php echo form_label('Email : ','Email',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('Email','','id="Email"'); ?>
                            </div>
                    </div>
                    
                    <div class="control-group">
                            <?php echo form_label('TelpHP : ','TelpHP',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('TelpHP','','id="TelpHP"'); ?>
                            </div>
                    </div>
                    
                    <div class="control-group">
                            <?php echo form_label('Catatan : ','Catatan',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('Catatan','','id="Catatan"'); ?>
                            </div>
                    </div>
                    
                    <div class="control-group">
                            <?php echo form_label('idstatus : ','idstatus',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('idstatus','','id="idstatus"'); ?>
                            </div>
                    </div>
                    
                    <button id="save" type="submit" class="btn btn-success"><icon class="icon-plus-sign"></icon> Add New</button>
                    <button id="save_edit" type="submit" class="btn btn-primary" style="display:none;"><icon class="icon-refresh"></icon> Update</button>

                    <?php echo form_close();?>
                 </div>
            </div>
            <div class="span9">

                <form id="form_del_all" method="post" class="form_del_all" action="<?php echo base_url();?>data/delete" >
                <table id="datatables" class="table table-condensed table-striped">
                    <thead class="">
                        <tr>
                                        <th>idpesanan</th>
                                        <th>idproduk</th>
                                        <th>NamaPemesan</th>
                                        <th>JumlahPesan</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>TelpHP</th>
                                        <th>Catatan</th>
                                        <th>idstatus</th>
                                        <th>Actions</th><th><input type="checkbox" id="selectallcheck" name="allcheck"/> </th>
                                    </tr>
                    </thead>

                    <tbody class="table-bordered">
                        <tr>
                            <td colspan="6" class="dataTables_empty">Loading data...</td>
                            
                        </tr>
                    </tbody>
                </table>
            </form>
            </div>
        </div>
        
    </div>

<?php $this->load->view('main/footer');?>
<script>
    $(document).ready(function(){
        $("#date").datepicker({
                    dateFormat: 'yy-mm-dd',
                });
         $('#selectallcheck').click (function () {
             var checkedStatus = this.checked;
            $('#datatables tbody tr').find('td:last :checkbox').each(function () {
                $(this).prop('checked', checkedStatus);
             });
        });
        //declare all html button as jqery button
        $("button").button();

        oTable=$('#datatables').dataTable({
            "sAjaxSource":"<?php echo base_url();?>pemesanan/getdatatables",
            "sScrollY": "300px",
            "sServerMethod": "POST",
            "bServerSide": true,
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "bAutoWidth": false,
            "bDeferRender": true,
            "bSortClasses": false,
            "bScrollCollapse": true,    
            "bStateSave": true,
            "aoColumns": [
                
                { "sClass": "idpesanan","sName": "idpesanan","sWidth": "50px", "aTargets": [0] } ,
                { "sClass": "idproduk", "sName": "idproduk", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "NamaPemesan", "sName": "NamaPemesan", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "JumlahPesan", "sName": "JumlahPesan", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Alamat", "sName": "Alamat", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Email", "sName": "Email", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "TelpHP", "sName": "TelpHP", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "Catatan", "sName": "Catatan", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "idstatus", "sName": "idstatus", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "100px","mData": 0,
                    "mDataProp": function(data, type, full) {
                    return "<div class='btn-group'><button class='edit btn btn-mini btn-success' id='"+data[0]+"'><icon class='icon-pencil'></icon></button><button class='delete btn btn-mini btn-danger'id='"+data[0]+"'><icon class='icon-remove'></icon></button><button class='detail btn btn-mini btn-primary' id='"+data[0]+"'><icon class='icon-cog'></icon></button></div>";
                }},
                { "sClass": "center", "bSortable": false, "bSearchable": false, "sWidth": "60px",
                    "mDataProp": function(data, type, full) {
                    return "<input class=\" btn btn-danger btn-mini\" value='"+ data[0]+"' type='checkbox' id='id['"+ data[0] +"]' name='del_all' />";
                }}
            ],
        });

        function save(idpesanan){
            var dataform={
                idpesanan:$('#idpesanan').val(),
                idproduk:$('#idproduk').val(),
                NamaPemesan:$('#NamaPemesan').val(),
                JumlahPesan:$('#JumlahPesan').val(),
                Alamat:$('#Alamat').val(),
                Email:$('#Email').val(),
                TelpHP:$('#TelpHP').val(),
                Catatan:$('#Catatan').val(),
                idstatus:$('#idstatus').val(),
                ajax:1
            };
            $(this).ready(function(){
                $.ajax({
                    url:"<?php echo base_url();?>pemesanan/submit",
                    data:dataform,
                    type:"POST",
                    success:function(){
                        $('button#save').fadeIn(200);
                        $('button#save_edit').hide(200);
                        
                        oTable.fnClearTable( 0 );
                        oTable.fnDraw();

                       
                        $('#idpesanan').val(''); 
                        $('#idproduk').val('');
                        $('#NamaPemesan').val('');
                        $('#JumlahPesan').val('');
                        $('#Alamat').val('');
                        $('#Email').val('');
                        $('#TelpHP').val('');
                        $('#Catatan').val('');
                        $('#idstatus').val('');
                       
                       // $('#name').focus();

                       
                    }
                });
            });
        }
        $("#addnew form").submit(function(e){   
            e.preventDefault();
            save(0);
        });
        
        $("button#save").live("click",function(e){
            e.preventDefault();
            save(0);
        });
        
        $("button#save_edit").live("click",function(e){
        
            e.preventDefault();
                var id=$(this).attr("id");
                save(id);
            
        });     

        $('button.edit').live("click",function(e){
            e.preventDefault();
            var id=$(this).attr("id");
            $(this).ready(function(){
                    $.ajax({
                        url:"<?php echo base_url();?>pemesanan/get/"+id,
                        type:"get",
                        dataType:"json",
                        success:function(data){
                            $('#idproduk').val(data.idproduk);
                            $('#NamaPemesan').val(data.NamaPemesan);
                            $('#JumlahPesan').val(data.JumlahPesan);
                            $('#Alamat').val(data.Alamat);
                            $('#Email').val(data.Email);
                            $('#TelpHP').val(data.TelpHP);
                            $('#Catatan').val(data.Catatan);
                            $('#idstatus').val(data.idstatus);
                            $('#idpesanan').val(data.idpesanan);

                            $('button#save').hide(200);
                            $('button#save_edit').fadeIn(200);
                            
                            oTable.fnClearTable( 0 );
                            oTable.fnDraw();
                        }
                    });
            });
            
        });


        $("button.delete").live("click",function(e){
            e.preventDefault();
                var del_data={
                    id:$(this).attr("id"),
                    ajax:1
                }
                if(confirm('Are You Sure?')){
                    $(this).ready(function(){
                            
                        $.ajax({
                            url: "<?php echo base_url()?>pemesanan/delete/",
                            type: 'POST',
                            data: del_data,
                            success:function(msg){
                                oTable.fnDraw(true);
                            }
                        });
                    });
                }
        });


        
    });
</script>
</body>
</html>