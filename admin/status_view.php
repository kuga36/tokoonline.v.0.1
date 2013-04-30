<?php $this->load->view('main/header');?>
       <div class="container-fluid">
        <div class="row-fluid">
            <div id="" class="brand span12">
                    <h1 class="">status Management</h1>
            </div>
            <div class="span3">
                <div id="form_input" class="">
                <?php if(!empty($status)){ echo var_dump($status);}?>
                <?php echo form_open('status/submit',array('id'=>'addform','class'=>'form form-vertical')); ?>
                    
                    <input type="hidden" value='' id="idstatus" name="idstatus">
                    
                    <div class="control-group">
                            <?php echo form_label('status : ','status',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('status','','id="status"'); ?>
                            </div>
                    </div>
                    
                    <div class="control-group">
                            <?php echo form_label('parent : ','parent',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('parent','','id="parent"'); ?>
                            </div>
                    </div>
                    
                    <div class="control-group">
                            <?php echo form_label('deskripsi : ','deskripsi',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('deskripsi','','id="deskripsi"'); ?>
                            </div>
                    </div>
                    
                    <div class="control-group">
                            <?php echo form_label('datetime : ','datetime',array('class'=>'control-label')); ?>
                            <div class="controls">
                                <?php echo form_input('datetime','','id="datetime"'); ?>
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
                                        <th>idstatus</th>
                                        <th>status</th>
                                        <th>parent</th>
                                        <th>deskripsi</th>
                                        <th>datetime</th>
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
            "sAjaxSource":"<?php echo base_url();?>status/getdatatables",
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
                
                { "sClass": "idstatus","sName": "idstatus","sWidth": "50px", "aTargets": [0] } ,
                { "sClass": "status", "sName": "status", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "parent", "sName": "parent", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "deskripsi", "sName": "deskripsi", "sWidth": "80px", "aTargets": [ 1 ] },
                { "sClass": "datetime", "sName": "datetime", "sWidth": "80px", "aTargets": [ 1 ] },
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

        function save(idstatus){
            var dataform={
                idstatus:$('#idstatus').val(),
                status:$('#status').val(),
                parent:$('#parent').val(),
                deskripsi:$('#deskripsi').val(),
                datetime:$('#datetime').val(),
                ajax:1
            };
            $(this).ready(function(){
                $.ajax({
                    url:"<?php echo base_url();?>status/submit",
                    data:dataform,
                    type:"POST",
                    success:function(){
                        $('button#save').fadeIn(200);
                        $('button#save_edit').hide(200);
                        
                        oTable.fnClearTable( 0 );
                        oTable.fnDraw();

                       
                        $('#idstatus').val(''); 
                        $('#status').val('');
                        $('#parent').val('');
                        $('#deskripsi').val('');
                        $('#datetime').val('');
                       
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
                        url:"<?php echo base_url();?>status/get/"+id,
                        type:"get",
                        dataType:"json",
                        success:function(data){
                            $('#status').val(data.status);
                            $('#parent').val(data.parent);
                            $('#deskripsi').val(data.deskripsi);
                            $('#datetime').val(data.datetime);
                            $('#idstatus').val(data.idstatus);

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
                            url: "<?php echo base_url()?>status/delete/",
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