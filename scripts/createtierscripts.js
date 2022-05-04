var audio = new Audio('./sounds/submit-tier.wav');

function titleInner() {
    return '<label for="title">Tier Title</label><br><br>\n' +
        '<input type="text" required id="title" name="tier-title" placeholder="Title"><br><br>\n';
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

function hasDuplicates(list) {
    return new Set(list).size !== list.length

}

function validateForm() {
    let values = [];
    $("#rankings-inputs").children("input").each(  function() {
        values.push(this.value);
    });

    values = values.map( i => i.toLowerCase()).map(i => i.trim())

    if(hasDuplicates(values)) {
        alert("You must have unique values for each tier.");
        return false;
    }
}

function rankingInput(index) {
    let indices = "SABCDEF";
    let i = indices[index];
    return `<input type="text" required name="tier-element[${i.toLowerCase()}_tier]" placeholder="Enter List Element - ${i}">`;
}

function rankingSection() {
    return $("<div></div>").attr("id", "rankings-inputs")
                .append(rankingInput(0))
                .append(rankingInput(1));
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
    if($("#rankings-inputs").children().length < 7) {
        let i = $("#rankings-inputs").children().length;
        $("#rankings-inputs").append(rankingInput(i));
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

        if($("#tier-submit-page").length > 0) {
            setTimeout(() => {
                audio.play();
            }, 100)
        }
}
$( document ).ready(function() {
    render();
});

