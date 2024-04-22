// Add Examinee
$(document).on("submit","#addExamineeFrm" , function(){
    $.post("query/addExamineeExe.php", $(this).serialize() , function(data){
      if(data.res == "noGender")
      {
        Swal.fire(
            'No Gender',
            'Please select gender',
            'error'
         )
      }
      else if(data.res == "noSection")
      {
        Swal.fire(
            'No Section',
            'Please enter your section',
            'error'
         )
      }
      else if(data.res == "fullnameExist")
      {
        Swal.fire(
            'Fullname Already Exist',
            data.msg + ' are already exist',
            'error'
         )
      }
      else if(data.res == "usernameExist")
      {
        Swal.fire(
            'Username Already Exist',
            data.msg + ' are already exist',
            'error'
         )
      }
      else if(data.res == "success")
      {
        Swal.fire(
            'Success',
            data.msg + ' are now successfully added',
            'success'
         )
          refreshDiv();
          $('#addExamineeFrm')[0].reset();
      }
      else if(data.res == "failed")
      {
        Swal.fire(
            "Something's Went Wrong",
            '',
            'error'
         )
      }
  
  
      
    },'json')
    return false;
  });