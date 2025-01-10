 // validation
 const formContact = document.getElementById("form_contact");
 const formPhone = document.getElementById("form-phone");
 const formName =document.getElementById("form-name");
 const formContent = document.getElementById("form-content");
 let errorMessage = "";

 function validatePhone(phoneNumber){
     const regex = /^(0|\+84)[1-9][0-9]{8}$/;
         if(phoneNumber!=="")
         {
             return regex.test(phoneNumber)
         }

 }
 function validateName(username) {
 
         const regex = /^(?!_)(?!.*__)[a-zA-Z0-9_àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ ]{3,30}(?<!_)$/;

     
     
     if (username !== "") {
         return regex.test(username);
     }
 
 
 return false;
}
 formContact.addEventListener('submit',function(e){
     e.preventDefault();
     if(!validatePhone(formPhone.value))
     {
         errorMessage="Số điện thoại không hợp lệ.\n";
     }
     if(!validateName(formName.value))
     {
         errorMessage += "Tên người dùng không hợp lệ.\n";
     }
     if(formContent.value=="")
     {
         errorMessage += "Nội dung không được để trống.";
     }
     if(errorMessage)
     {

         alert(errorMessage);
         errorMessage="";
     }
     else
     {
         formContact.submit();
     }

 })

