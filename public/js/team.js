function fileSelected(element) {
    var file_name = $(element).val();
    console.log($(element));
    console.log(file_name);
      if (file_name == "")
      {
        $(element).next().text("Choose File");
      }

      else
      {
        file_name = file_name.substring(file_name.lastIndexOf("\\") + 1, file_name.length);
        $(element).next().text(file_name);
      }
}

function flip(element) {
    $(element).parent().parent().parent().parent().parent().toggleClass("focus")
}