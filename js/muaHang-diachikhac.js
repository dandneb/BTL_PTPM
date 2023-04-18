var host = "https://provinces.open-api.vn/api/";

var callAPI_khac = (api) => {
    return axios.get(api).then((response) => {
        renderData(response.data, "province_khac");
    });
}

callAPI_khac('https://provinces.open-api.vn/api/?depth=1');

var callApiDistrict_khac = (api) => {
    return axios.get(api).then((response) => {
        renderData(response.data.districts, "district_khac");
    });
}

var callApiWard_khac = (api) => {
    return axios.get(api).then((response) => {
        renderData(response.data.wards, "ward_khac");
    });
}

var renderData = (array, select) => {
    let row = '<option selected disabled value="">---</option>';
    array.forEach(element => {
        row += `<option value='${element.code}'>${element.name}</option>`
    })
    document.querySelector("#"+select).innerHTML = row;
}

$("#province_khac").change(() => {
    callApiDistrict_khac(host + "p/" + $("#province_khac").val() + "?depth=2");
    $("#ward_khac").html("<option selected disabled value=''>---</option>");
    $("#tinhthanh_khac").val($("#province_khac option:selected").text());
    $("#district_khac").prop("disabled", false);
    $("#ward_khac").prop("disabled", true);
})

$("#district_khac").change(() => {
    callApiWard_khac(host + "d/" + $("#district_khac").val() + "?depth=2");
    $("#quanhuyen_khac").val($("#district_khac option:selected").text());
    $("#ward_khac").prop("disabled", false);
})

$("#ward_khac").change(() => {
    $("#phuongxa_khac").val($("#ward_khac option:selected").text());
})