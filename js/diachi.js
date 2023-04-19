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
})

$("#district").change(() => {
    callApiWard(host + "d/" + $("#district").val() + "?depth=2");
    $("#quanhuyen").val($("#district option:selected").text());
    $("#ward").prop("disabled", false);
})

$("#ward").change(() => {
    $("#phuongxa").val($("#ward option:selected").text());
})