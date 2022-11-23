   <!-- Bootstrap core JavaScript-->
   <script src="{{ asset('sb-admin/vendor/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

   <!-- Core plugin JavaScript-->
   <script src="{{ asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

   <!-- Custom scripts for all pages-->
   <script src="{{ asset('sb-admin/js/sb-admin-2.min.js')}}"></script>


   <!-- Page level plugins -->
   <script src="{{ asset('sb-admin/vendor/chart.js/Chart.min.js')}}"></script>

   <script src="http://code.jquery.com/jquery-3.4.1.js"></script>

   <!-- Page level custom scripts -->
   <script src="{{ asset('sb-admin/js/demo/chart-area-demo.js')}}"></script>
   <script src="{{ asset('sb-admin/js/demo/chart-pie-demo.js')}}"></script>

   <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

   <script>
       $(document).ready(function () {
           $('#barang_id').on('change', function () {
               let id = $(this).val();
               $('#banyaknya').empty();
               $('#banyaknya').append(`<option value="0" disabled selected>Processing...</option>`);
               $.ajax({
                   type: 'GET',
                   url: 'listBanyaknya/' + id,
                   success: function (response) {
                       var response = JSON.parse(response);
                       console.log(response);
                       $('#banyaknya').empty();
                       $('#banyaknya').append(
                           `<option value="0" disabled selected>Select Number Of Borrowing</option>`
                           );
                       response.forEach(element => {
                           for (let i = 1; i <=element['jumlah'] ; i++) {
                              $('#banyaknya').append(
                               `<option value=${i}>${i}</option>`
                               );
                           }
                       });
                   }
               });
           });
        
       });

   </script>
