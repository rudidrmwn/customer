$("#province").change(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    const valueId = $(this).val();

    $.ajax({
        type: "GET",
        url: "cities",
        data: {
            ProvinceId: valueId,
        },
        success: function (result) {
            $("#cities").empty();
            $("#cities").append(
                '<option selected disabled value="">Choose The City</option>'
            );

            if (result && result.status === "success") {
                result.data.map((city) => {
                    const cities = `<option value='${city.id}'> ${city.cities_name} </option>`;
                    $("#cities").append(cities);
                });
            }
        },
        error: function (result) {
            console.log("error", result);
        },
    });
});