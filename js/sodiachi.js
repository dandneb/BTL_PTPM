$.getJSON("https://restcountries.com/v3.1/all", function(data) {
    const countries = data.map(country => country.name.common);
    populateSelect(countries);
    $("#country").val("Vietnam");
});

function populateSelect(countries) {
    const select = $("#country");
    $.each(countries, function(index, country) {
        const option = $("<option>").text(country).val(country);
        select.append(option);
    });
}

$("#country").change(() => {
    if($("#country").val() !== "Vietnam"){
        $("#col-tinhthanh").remove();
        $("#col-quanhuyen").remove();
        $("#col-phuongxa").remove();
        $('#script-diachi').remove();
    }else{
        $("#col-tinhthanh").remove();
        $("#col-quanhuyen").remove();
        $("#col-phuongxa").remove();
        $('#script-diachi').remove();
        $("#col-quocgia").after(`
        <div class="col-md-4 me-0" id="col-tinhthanh">
            <label class="form-label" for="validationCustom01">Tỉnh thành</label>
            <select class="form-select mb-3" name="province" id = "province" required>
                <option selected disabled value="">---</option>
                <option value='0'>OPTION</option>
            </select>
            <input type="hidden" name="tinhthanh" id="tinhthanh">
            <div class="invalid-feedback">
                Hãy chọn tỉnh thành của bạn!
            </div>
        </div>
        <div class="col-md-4 me-0" id="col-quanhuyen">
            <label class="form-label" for="validationCustom01">Quận huyện</label>
            <select class="form-select mb-3" name="district" id = "district" disabled required>
                <option selected disabled value="">---</option>
                <option value='0'>OPTION</option>
            </select>
            <input type="hidden" name="quanhuyen" id="quanhuyen">
            <div class="invalid-feedback">
                Hãy chọn quận huyện của bạn!
            </div>
        </div>
        <div class="col-md-4 me-0" id="col-phuongxa">
            <label class="form-label" for="validationCustom01">Phường xã</label>
            <select class="form-select mb-3" name="ward" id = "ward" disabled required>
                <option selected disabled value="">---</option>
                <option value='0'>OPTION</option>
            </select>
            <input type="hidden" name="phuongxa" id="phuongxa">
            <div class="invalid-feedback">
                Hãy chọn phường xã của bạn!
            </div>
        </div>
        <script id="script-diachi" src="js/sodiachi.js"></script>
        `);
    }
})

var host = "https://provinces.open-api.vn/api/";

var callAPI = (api) => {
    return axios.get(api).then((response) => {
        renderData(response.data, "province");
    });
}

callAPI('https://provinces.open-api.vn/api/?depth=1');

var callApiDistrict = (api) => {
    return axios.get(api).then((response) => {
        renderData(response.data.districts, "district");
    });
}

var callApiWard = (api) => {
    return axios.get(api).then((response) => {
        renderData(response.data.wards, "ward");
    });
}

var renderData = (array, select) => {
    let row = '<option selected disabled value="">---</option>';
    array.forEach(element => {
        row += `<option value='${element.code}'>${element.name}</option>`
    })
    document.querySelector("#"+select).innerHTML = row;
}

$("#province").change(() => {
    callApiDistrict(host + "p/" + $("#province").val() + "?depth=2");
    $("#ward").html("<option selected disabled value=''>---</option>");
    $("#tinhthanh").val($("#province option:selected").text());
    $("#district").prop("disabled", false);
    $("#ward").prop("disabled", true);
    console.log($("#tinhthanh").val())
})

$("#district").change(() => {
    callApiWard(host + "d/" + $("#district").val() + "?depth=2");
    $("#quanhuyen").val($("#district option:selected").text());
    $("#ward").prop("disabled", false);
    console.log($("#quanhuyen").val())
})

$("#ward").change(() => {
    $("#phuongxa").val($("#ward option:selected").text());
    console.log($("#phuongxa").val())
})