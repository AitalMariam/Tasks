$(document).ready(function() {

    var t = $('#usechecklist').DataTable({
        "paging": false,
        "searching": false
    });

} );


function saveSub()
{
    var values = new Array();
    $('#usechecklist tr').each(function() {
        if (!this.rowIndex) return; // skip first row
        // ERR if type is Checkbox
        var content = this.cells[1].children[0].val();
        values.push(content);
        alert(content);
    });
}