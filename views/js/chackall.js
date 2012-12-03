function toggle(source) {
  checkboxes = document.getElementsByName('list[]');
  for(var i in checkboxes)
    checkboxes[i].checked = source.checked;
}