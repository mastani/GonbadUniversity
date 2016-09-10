var bestMatch = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        url: 'ajax_search.php?query=%QUERY',
        wildcard: '%QUERY'
    }
});

$('#rtl-support .typeahead').typeahead(null, {
    name: 'users_data',
    display: 'value',
    source: bestMatch,
    templates: {
        empty: [
            '<div class="empty-message">',
            'نتیجه ای یافت نشد',
            '</div>'
        ].join('\n'),
        suggestion: Handlebars.compile('<div><strong>{{value}}</strong> – {{label}}</div>')
    }
}).bind('typeahead:select', function (ev, suggestion) {
    loadData(suggestion.id);
});


var key;
var editMode = false;

var values = {
    id: "",
    ptitle: "",
    pname: "",
    pfamily: "",
    pfather: "",
    id_code: "",
    national_code: "",
    birthday: "",
    personnel_code: "",
    file_code: "",
    employment: "",
    activity_area: "",
    activity_location: "",
    employment_date: "",
    position: "",
    marriage_status: "",
    role: "",
    phone: "",
    degree: "",
    field: "",
    birth_place: "",
    religion: "",
    id_location: "",
    military_state: "",
    ename: "",
    efamily: ""
};

var editStructure = "<input type=\"text\" class=\"1 form-control\" id=\"1\" name=\"1\">";
var showStructure = "<span class=\"1\" id=\"1\"></span>";

var customEditStructure = {
    ptitle: "<select class=\"ptitle form-control\" id=\"ptitle\"><option value=\"جناب آقای\">جناب آقای</option><option value=\"سرکار خانم\">سرکار خانم</option></select>",
    employment: "<select class=\"employment form-control\" id=\"employment\"><option value=\"رسمی\">رسمی</option><option value=\"پیمانی\">پیمانی</option></select>",
    activity_area: "<select class=\"activity_area form-control\" id=\"activity_area\"><option value=\"دانشکده A\">دانشکده A</option><option value=\"دانشکده B\">دانشکده B</option></select>",
    marriage_status: "<select class=\"marriage_status form-control\" id=\"marriage_status\"><option value=\"متاهل\">متاهل</option><option value=\"مجرد\">مجرد</option></select>",
};

function loadData(id) {
    $.ajax({
        url: "Load.php?id=" + id, success: function (result) {
            var data = JSON.parse(result);
            for (key in values) {
                values[key] = data[key];
            }
            if (data.gender == 'Male') values["ptitle"] = 'جناب آقای'; else values["ptitle"] = 'سرکار خانم';
            if (data.employment == 'Rasmi') values["employment"] = 'رسمی'; else values["employment"] = 'پیمانی';
            if (data.activity_area == 'دانشکده A') values["activity_area"] = 'دانشکده A'; else values["activity_area"] = 'دانشکده B';
            if (data.marriage_status == 'Single') values["marriage_status"] = 'مجرد'; else values["marriage_status"] = 'متاهل';
            switchMode(editMode);
            loadImage(id);
        }
    });
    return 0;
}

$('input[name="edit-mode"]').on('switchChange.bootstrapSwitch', function (event, state) {
    if (state == true) {
        switchMode(true);
    } else {
        switchMode(false);
    }
});

function switchMode(mode) {

    // Set containers
    if (mode == true) {
        editMode = true;
        for (key in values) {
            $('.' + key + '-container').html(editStructure.replace(/1/gi, key));
        }
        $('.ptitle-container').html(customEditStructure["ptitle"]);
        $('.employment-container').html(customEditStructure["employment"]);
        $('.activity_area-container').html(customEditStructure["activity_area"]);
        $('.marriage_status-container').html(customEditStructure["marriage_status"]);

        $("#birthday").pDatepicker({format: "YYYY/MM/DD"});
        $("#employment_date").pDatepicker({format: "YYYY/MM/DD"});
    } else {
        editMode = false;
        for (key in values) {
            $('.' + key + '-container').html(showStructure.replace(/1/gi, key));
        }
    }

    // Set values
    if (editMode) {
        for (key in values) {
            $('.' + key).val(values[key]);
        }
    } else {
        for (key in values) {
            $('.' + key).html(values[key]);
        }
    }

    $('*').persiaNumber();
}

function loadImage(id) {
    $.ajax({
        url: 'person/' + id + '.jpg',
        type: 'HEAD',
        error: function () {
            $("#imagePreview").css("background-image", "url(images/no-profile.png)");
        },
        success: function () {
            $("#imagePreview").css("background-image", "url(person/" + id + ".jpg)");
        }
    });
}

String.prototype.format = function () {
    var args = arguments;
    return this.replace(/\{(\d+)\}/g, function (m, n) {
        return args[n];
    });
};

$(document).ready(function () {
    $("[name='edit-mode']").bootstrapSwitch();

    switchMode(true);
});