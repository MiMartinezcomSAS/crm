


var d = document,
    role=d.getElementById("role_id"),
    enca= d.getElementById("encargado"),
    texto= d.getElementById("textos");
var role1=document.getElementById("role_id");


function roleClick(){
    //alert("maicol es un imbecil")
    var selectedValue = this.options[this.selectedIndex].value;

    console.log(selectedValue)
    if (selectedValue ==3   ){  
        enca.classList.remove('hidden')
        texto.classList.remove('hidden')
        document.formu.encargado.value='auto';
    }else{
        document.formu.encargado.value='auto';
        enca.classList.add('hidden')
        texto.classList.add('hidden')

    }
}
 function test()
    {
        var campo= document.getElementById("role_id").value;
        var campo1 =document.getElementById("encargado");
        var textos =document.getElementById("textos"); 
      if(campo<3)
                  {

                    textos.classList.add('hidden');
                    campo1.classList.add('hidden');
                    encargado.value="auto";
                  }else{
                    encargado.value="auto";
                    textos.classList.remove('hidden');
                    campo1.classList.remove('hidden');
                  }
    }

function init(){
    //role.addEventListener('click', roleClick);
    role1.addEventListener('change', test);
    //role.addEventListener('change', roleClick);

    console.log(role1)
}

init ();

