var btn_info_conv = document.getElementById('btn_info_conv');
btn_info_conv.addEventListener("click",function(){
    var idi = document.getElementById('idIntegrante').value;
    var url = "../view/?p=fic&idi=" + idi;
    window.location.href = url;
});

var btn_info_edit = document.getElementById('btn_info_edit');
btn_info_edit.addEventListener("click",function(){
    var idi = document.getElementById('idIntegrante').value;
    var url = "../view/?p=ficed&idi=" + idi;
    url += "&t=m";
    window.location.href = url;
});