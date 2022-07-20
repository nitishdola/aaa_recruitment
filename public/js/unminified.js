$.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0}');

jQuery(function ($) {
      "use strict";
      $('#save_form').validate({
        rules: {
            recent_photo: {
                required: true,
                extension: "jpg,jpeg,png",
                filesize: 4,
            },
            signature: {
                required: true,
                extension: "jpg,jpeg,png",
                filesize: 4,
            },
            hslc_admit_card: {
                required: true,
                extension: "pdf",
                filesize: 4,
            },
            hslc_marksheet: {
                required: true,
                extension: "pdf",
                filesize: 4,
            },
            hslc_certificate: {
                required: true,
                extension: "pdf",
                filesize: 4,
            },
            hs_marksheet: {
                required: true,
                extension: "pdf",
                filesize: 4,
            },
            hs_certificate: {
                required: true,
                extension: "pdf",
                filesize: 4,
            },
            computer_certificate: {
                extension: "pdf",
                filesize: 4,
            },
            exp_certificate: {
                required: true,
                extension: "pdf",
                filesize: 4,
            }

        },
      });
});

   function calculateAge(dob) { // birthday is a date
      var startDate = moment(dob, 'YYYY-MM-DD');
      var endDate = moment('2022-01-01', 'YYYY-MM-DD');
      return yearDiff = endDate.diff(startDate, 'years');
   }
   

   $('.datepicker').Zebra_DatePicker({
         view: 'years',
         onSelect: function() {
            dob_selected = $(this).val();

            if(calculateAge(dob_selected) > 40) {
               $('#submit_btn').attr('disabled','disabled');
               alert('Age must be below 40 years to apply.');
            }else{
               $('#submit_btn').removeAttr('disabled');
            }
         }
   });

   $('.select2').select2();

   $('#same_present_address').click(function() {
      if ($("#same_present_address").is(":checked")) {
         $("#permanent_street_address_1").val($('#present_street_address_1').val());
         $("#permanent_street_address_2").val($('#present_street_address_2').val());
         /*$("#permanent_village").val($('#ppresent_village').val());
         $("#permanent_town").val($('#present_town').val());
         $("#permanent_city").val($('#present_city').val());*/
         $('#permanent_village_town_city').val($('#present_village_town_city').val());
         $('#permanent_pin').val($('#present_pin').val());
         $("#permanent_district_id").val($('#present_district_id').val());
         $("#permanent_district_id").val($('#present_district_id').val());
         $("#permanent_police_station").val($('#present_police_station').val());
      }else{
         $("#permanent_street_address_1").val('');
         $("#permanent_street_address_2").val('');
         /*$("#permanent_village").val('');
         $("#permanent_town").val('');
         $("#permanent_city").val('');*/
         $('#permanent_village_town_city').val('');
         $('#permanent_pin').val('');
         $("#permanent_district_id").val('');
         $("#permanent_district_id").val('');
         $("#permanent_police_station").val('');
      }
   });

   $('.empexch').click(function() {
      $val = $(this).val();
      if($val == 'Yes') {
         $('#empechno').fadeIn();
      }else{
         $('#empechno').hide();
      }
   });


   $('.exp').click(function() {
      $expval = $(this).val();

      if($expval == 'Yes') {
         $('#expinhealth').fadeIn();
      }else{
         $('#expinhealth').hide();
      }
   });

   $('#declaration').click(function() {
      decla = $(this).val();

      if($('#declaration').prop('checked', true)) {
         $('#submit_btn').removeAttr('disabled');
      }else{
         $('#submit_btn').attr('disabled','disabled');
      }
   });