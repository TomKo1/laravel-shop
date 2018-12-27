$(document).ready(function(){
  var i=1;

  $('#add').click(function(){
    i++;
    $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="street[]" placeholder="Street" class="form-control name_street" /></td><td><input type="text" name="city[]" placeholder="City Name" class="form-control name_city" /></td><td><input type="text" name="zip[]" placeholder="Zip Code" class="form-control zip_code" /></td></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
  });

  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id");
    $('#row'+button_id+'').remove();
  });

});