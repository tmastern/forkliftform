/*grab all td elements in your table
var tds = document.querySelectorAll(".gmisc_table td");
//iterate over each td
for (var i = 0; i < tds.length; i++) {
  var text = tds[i].innerText;
  //check for your target text
  if (text === "BAD") {
    //add your class to the element containing this text
    tds[i].classList.add("BAD");
  }
}
*/
var cells = document.getElementById('forkrpt').getElementsByTagName('td');
for (var i = 0; i < cells.length; i++) {
    if (cells[i].innerHTML == 'BAD') {
        cells[i].style.backgroundColor = "red";
    }
}

/*var allTableCells = document.getElementsByTagName("td");

for(var i = 0, max = allTableCells.length; i < max; i++) {
    var node = allTableCells[i];

    //get the text from the first child node - which should be a text node
    var currentText = node.childNodes[0].nodeValue; 

    //check for 'one' and assign this table cell's background color accordingly 
    if (currentText === "BAD")
        node.style.backgroundColor = "red";
}

td_array = document.getElementsByTagName("td");
check_value = "BAD";

for (i = 0; i < td_array.length; i++){
  if (td_array[i].textContent == check_value){
    td_array[i].style.color = "red";
  };
};

var $rows = $('#forkrpt table tr');
$rows.each(function(i, item) {
    $this = $(item).find('td:*');
    if ($this.text() = 'BAD' ) {
        $this.closest('tr').find('td').addClass('BAD');
    }

});

$('td').each(function () {
  if ($(this).html().match(BAD)) {
      $(this).css('background-color', 'red');
      // TODO: something cool
  }
});

$('td').filter(function(){
  return /\b[a-zA-Z]{3}\b/.test( $.text(this) );
})
.css('color', 'red'); // or anything else...
*/