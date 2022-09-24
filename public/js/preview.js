var f = document.getElementById('file');
var reader = new FileReader();



f.addEventListener('change', function(){
    console.log('change');
    filePreview(this);
});

function filePreview(input) {

    console.log(input.files);

    if (input.files && input.files[0]) {

        

        reader.readAsDataURL(input.files[0]);

        

        reader.addEventListener('load', function(e){

            var img = document.getElementById('preview');
            img.src = e.target.result;
            console.log(e.target.result);

        });

   

}

}