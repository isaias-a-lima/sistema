var btn_info_edit = document.getElementById('btn_info_edit');
btn_info_edit.addEventListener("click",function(){
    var idi = document.getElementById('idIntegrante').value;
    var url = "../view/?p=ficed&idi=" + idi;
    url += "&t=fic";
    window.location.href = url;
});