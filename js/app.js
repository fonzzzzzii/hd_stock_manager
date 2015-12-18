//Java script

function getData(meta_key)
{
  var posting = $.post("php/script.php",{mk: meta_key});
  alert("here");
  posting.done(function(data){
    alert(data);
  });

  posting.fail(function(){
    alert("Posting Failed");
  })
}

$(document).ready(funciton(){
  alert("here0");
  //getData("_sku");
});
