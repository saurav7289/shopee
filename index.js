function showContent(contentId) {
  var sections = document.getElementsByClassName('content');

  for (var i = 0; i < sections.length; i++) {
    sections[i].style.display = 'none';
  }

  document.getElementById(contentId).style.display = 'block';
}

