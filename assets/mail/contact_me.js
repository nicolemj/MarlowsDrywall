// $(function () {
//     $(
//         "#contactForm input,#contactForm textarea,#contactForm button"
//     ).jqBootstrapValidation({
//         preventSubmit: true,
//         submitError: function ($form, event, errors) {
//             // additional error messages or events
//         },
//         submitSuccess: function ($form, event) {
//             event.preventDefault(); // prevent default submit behaviour
//             // get values from FORM
//             var name = $("input#name").val();
//             var email = $("input#email").val();
//             var phone = $("input#phone").val();
//             var message = $("textarea#message").val();
//             var inputAddress = $("input#inputAddress").val();
//             var city = $("input#city").val();
//             var type = $("input#city").val();
//             var type2 = $("input#city").val();
//             var firstName = name; // For Success/Failure Message
//             // Check for white space in name for Success/Fail message
//             if (firstName.indexOf(" ") >= 0) {
//                 firstName = name.split(" ").slice(0, -1).join(" ");
//             }
//             $this = $("#sendMessageButton");
//             $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
//             $.ajax({
//                 url: "./contact_me.php",
//                 type: "POST",
//                 data: {
//                     name: name,
//                     phone: phone,
//                     email: email,
//                     message: message,
//                     inputAddress: inputAddress,
//                     type: type,
//                     city: city,
//                     type2: type2
//                 },
//                 cache: false,
//                 success: function () {
//                     // Success message
//                     $("#success").html("<div class='alert alert-success'>");
//                     $("#success > .alert-success")
//                         .html(
//                             "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
//                         )
//                         .append("</button>");
//                     $("#success > .alert-success").append(
//                         "<strong>Your message has been sent. </strong>"
//                     );
//                     $("#success > .alert-success").append("</div>");
//                     //clear all fields
//                     $("#contactForm").trigger("reset");
//                 },
//                 error: function () {
//                     // Fail message
//                     $("#success").html("<div class='alert alert-danger'>");
//                     $("#success > .alert-danger")
//                         .html(
//                             "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
//                         )
//                         .append("</button>");
//                     $("#success > .alert-danger").append(
//                         $("<strong>").text(
//                             "Sorry " +
//                                 firstName +
//                                 ", it seems that my mail server is not responding. Please try again later!"
//                         )
//                     );
//                     $("#success > .alert-danger").append("</div>");
//                     //clear all fields
//                     $("#contactForm").trigger("reset");
//                 },
//                 complete: function () {
//                     setTimeout(function () {
//                         $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
//                     }, 1000);
//                 },
//             });
//         },
//         filter: function () {
//             return $(this).is(":visible");
//         },
//     });

//     $('a[data-toggle="tab"]').click(function (e) {
//         e.preventDefault();
//         $(this).tab("show");
//     });
// });

$("#type").change(function() {
    if ($(this).val() == "NewBuild") {
      $('#type2').show();
    } else {
      $('#type2').hide();
    }
  });
//   $("#type").change(function() {
//     if ($(this).val() == "Remodel") {
//       $('#myFile').show();
//     } else {
//       $('#myFile').hide();
//     }
//   });
  $("#type").trigger("change");


/*When clicking on Full hide fail/success boxes */
$("#name").focus(function () {
    $("#success").html("");
});
