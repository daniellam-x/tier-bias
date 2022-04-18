
function titleInner() {
    return '<label for="title">Tier Title</label><br><br>\n' +
        '<input type="text" id="title" placeholder="Title"><br><br>\n';
    ;
}

function title() {
    let e = $("<div></div>")
                .attr("id", "title-section")
                .append(titleInner())
    return e;

}

function rankingLabel() {
    return "<label style='content-align:center;'>Enter Rankings</label><br><br>\n";
}

function rankingInput() {
    return '<input type="text" placeholder="Enter List Element"><br><br>';
}

function rankingSection() {
    return $("<div></div>").attr("id", "rankings-inputs")
                .append(rankingInput())
                .append(rankingInput());
}

function rankings() {
    let e = $("<div></div>")
                .attr("id", "rankings-section")
                .append(rankingLabel())
                .append(rankingSection());
    return e;

}

function addTierElement() {
    console.log("addTierElement");
    if($("#rankings-inputs").children().length < 26) {
        $("#rankings-inputs").append(rankingInput());
    }
}

function removeTierElement() {
    console.log("removeTierElement");
    if($("#rankings-inputs").children().length > 2) {
        $("#rankings-inputs").find("input:last").remove();
        $("#rankings-inputs").find("br:last").remove();
        $("#rankings-inputs").find("br:last").remove();
    }
}

function addTierElementButton() {
    return $("<button></button>")
                .text("Add Row")
                .attr("type", "button")
                .click(addTierElement);
}

function removeTierElementButton() {
    return $("<button></button>")
                .text("Delete Row")
                .attr("type", "button")
                .click(removeTierElement);
}

function submitButton() {
    return $("<div></div>").append('<input type="submit" name="confirm"/>');
}

function editButtons() {
    let e = $("<div></div>")
                .attr("id", "buttons-section")
                .append($("<br/>"))
                .append(addTierElementButton())
                .append($("<br/>")).append($("<br/>"))
                .append(removeTierElementButton())
                .append($("<br/>")).append($("<br/>"))
                .append(submitButton());

    return e;

}

function render() {
    console.log("render");
    $("#form-contents")
        .append(title())
        .append(rankings())
        .append(editButtons());

}

render();