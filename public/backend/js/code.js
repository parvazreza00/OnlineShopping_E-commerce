$(function(){
    $(document).on('click', '#delete', function(e){
      e.preventDefault();
      var link = $(this).attr("href");
            Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      })
    });
  });

  //confirm 
  $(function(){
    $(document).on('click', '#confirm', function(e){
      e.preventDefault();
      var link = $(this).attr("href");
            Swal.fire({
        title: 'Are you sure to confirm?',
        text: "Ones confirm, you will not be able pending again!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Confirm it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Confirm!',
            'Confirm changes.',
            'success'
          )
        }
      })
    });
  });

  //processing 
  $(function(){
    $(document).on('click', '#processing', function(e){
      e.preventDefault();
      var link = $(this).attr("href");
            Swal.fire({
        title: 'Are you sure to Processing?',
        text: "Ones Processing, you will not be able pending again!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Processing it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Processing!',
            'Processing changes.',
            'success'
          )
        }
      })
    });
  });

  //picked 
  $(function(){
    $(document).on('click', '#picked', function(e){
      e.preventDefault();
      var link = $(this).attr("href");
            Swal.fire({
        title: 'Are you sure to Picked?',
        text: "Ones Picked, you will not be able pending again!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Picked it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Picked!',
            'Picked changes.',
            'success'
          )
        }
      })
    });
  });

  //shipped 
  $(function(){
    $(document).on('click', '#shipped', function(e){
      e.preventDefault();
      var link = $(this).attr("href");
            Swal.fire({
        title: 'Are you sure to Shipped?',
        text: "Ones Shipped, you will not be able pending again!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Shipped it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Shipped!',
            'Shipped changes.',
            'success'
          )
        }
      })
    });
  });

  //delivered 
  $(function(){
    $(document).on('click', '#delivered', function(e){
      e.preventDefault();
      var link = $(this).attr("href");
            Swal.fire({
        title: 'Are you sure to Delivered?',
        text: "Ones Delivered, you will not be able pending again!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delivered it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Delivered!',
            'Delivered changes.',
            'success'
          )
        }
      })
    });
  });

  //cancel 
  $(function(){
    $(document).on('click', '#cancel', function(e){
      e.preventDefault();
      var link = $(this).attr("href");
            Swal.fire({
        title: 'Are you sure to Cancel?',
        text: "Ones Cancel, you will not be able pending again!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Cancel it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Cancel!',
            'Cancel changes.',
            'success'
          )
        }
      })
    });
  });
