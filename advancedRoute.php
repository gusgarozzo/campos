<?php
    require_once 'app/controller/controller.php';
    require_once 'RouterClass.php';

    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/out');

    $r = new Router();

    /*----------------URLS----------------*/
    
    
    //DASHBOARD
    $r->addRoute("", "GET", "controller", "dashboardController");
    $r->addRoute("dashboard", "GET", "controller", "dashboardController");

    //ADMIN
    $r->addRoute("administracion", "GET", "controller", "admController");
    $r->addRoute("admUsers", "GET", "controller", "usersController");
    $r->addRoute("admProviders", "GET", "controller", "providersController");
    $r->addRoute("admCustomers", "GET", "controller", "customerController");
    $r->addRoute("admSalesChannel", "GET", "controller", "salesChannelController");
/*
    //BOOKINGS
    $r->addRoute("checkin", "GET", "controller", "checkInController");
    $r->addRoute("checkout", "GET", "controller", "checkOutController");
    $r->addRoute("noShow", "GET", "controller", "noShow");
    $r->addRoute("deshacerNoShow", "GET", "controller", "undoNoShow");
    $r->addRoute("cancelarReserva", "GET", "controller", "cancelBooking");
    $r->addRoute("reservas", "GET", "controller", "bookingsController");
    $r->addRoute("buscarDisp", "POST", "controller", "checkAvailability");
    $r->addRoute("reservar", "POST", "controller", "newBooking");
    $r->addRoute("nuevaReserva", "POST", "controller", "newBookingController");
    $r->addRoute("finalizarReserva", "POST", "controller", "finalizeBooking");
    $r->addRoute("editarReserva", "GET", "controller", "editBooking");
    $r->addRoute("editandoReserva", "POST", "controller", "editingBooking");
    $r->addRoute("seleccionarHuesped", "POST", "controller", "bookingSelectGuest");
    $r->addRoute("llegadasHoy", "GET", "controller", "todayIn");
    $r->addRoute("salidasHoy", "GET", "controller", "todayOut");
    $r->addRoute("buscarReservas", "POST", "controller", "searchBookings");
    $r->addRoute("buscarMes", "POST", "controller", "visualizeGridMonth");
    
    //ROOMS
    $r->addRoute("habitaciones", "GET", "controller", "roomsController");
    $r->addRoute("agregarHabitacion", "POST", "controller", "addRoom");
    $r->addRoute("habilitarHabitacion", "GET", "controller", "enableRoom");
    $r->addRoute("deshabilitarHabitacion", "GET", "controller", "disableRoom");
    $r->addRoute("editarHabitacion", "POST", "controller", "editRoom");
    $r->addRoute("editandoHabitacion", "POST", "controller", "editingRoom");
    $r->addRoute("cambiarSucia", "POST", "controller", "setDirty");
    $r->addRoute("cambiarLimpia", "POST", "controller", "setClean");
    $r->addRoute("nuevoComentarioHab", "POST", "controller", "newRoomComment");
    $r->addRoute("agregandoComentarioHab", "POST", "controller", "addRoomComment");
    $r->addRoute("editarComentarioHab", "POST", "controller", "editRoomComment");
    $r->addRoute("editandoComentarioHab", "POST", "controller", "editingRoomComment");
    $r->addRoute("eliminarComentarioHab", "POST", "controller", "deleteRoomComment");
    
    //MESSAGES
    $r->addRoute("seen", "GET", "controller", "setSeen");
    $r->addRoute("enviarMensaje", "POST", "controller", "sendMessage");
    $r->addRoute("mensajes", "GET", "controller", "messagesController");
    
    //SESSION
    $r->addRoute("login", "GET", "loginController", "userLogin");
    $r->addRoute("logout", "GET", "loginController", "userLogout");
    $r->addRoute("verifyUser", "POST", "loginController", "verifyUser");

    //GUEST ACCOUNT
    $r->addRoute("cuenta", "GET", "controller", "guestAccountController");
    $r->addRoute("cargo", "GET", "controller", "chargeController");
    $r->addRoute("nuevoCargo", "POST", "controller", "newAccountItem");
    $r->addRoute("cancelarItem", "GET", "controller", "cancelItem");
    $r->addRoute("editarItem", "GET", "controller", "editItem");
    $r->addRoute("editandoItem", "POST", "controller", "editingItem");

    //GUESTS
    $r->addRoute("buscarHuesped", "POST", "controller", "searchGuest");
    $r->addRoute("nuevoHuesped", "POST", "controller", "addGuest");
    $r->addRoute("verReservas", "GET", "controller", "guestBookings");
    $r->addRoute("filtroHuesped", "POST", "controller", "adminGuestFilter");
    $r->addRoute("buscarReservasHuesped", "POST", "controller", "searchGuestBookings");
    

    //PAYMENT
    $r->addRoute("cobros", "GET", "controller", "paymentHistory");
    $r->addRoute("cobrarComanda", "GET", "controller", "paymentController");
    $r->addRoute("nuevoPago", "POST", "controller", "newPayment");

    //USERS
    $r->addRoute("agregarUsuario", "POST", "controller", "addUser");
    $r->addRoute("habilitarUsuario", "GET", "controller", "enableUser");
    $r->addRoute("deshabilitarUsuario", "GET", "controller", "disableUser");
    $r->addRoute("perfil", "GET", "controller", "profileController");
    $r->addRoute("editandoNombreUsuario", "POST", "controller", "editUserLastname");
    $r->addRoute("editandoApellidoUsuario", "POST", "controller", "editUserLastname");
    $r->addRoute("editandoEmailUsuario", "POST", "controller", "editUserEmail");
    $r->addRoute("editandoContrasenaUsuario", "POST", "loginController", "editUserPass");

    //SALE CHANNEL
    $r->addRoute("habilitarCanal", "GET", "controller", "enableChannel");
    $r->addRoute("deshabilitarCanal", "GET", "controller", "disableChannel");
    $r->addRoute("editarCanal", "GET", "controller", "editChannel");
    $r->addRoute("editandoCanal", "POST", "controller", "editingChannel");
    $r->addRoute("agregarCanal", "POST", "controller", "addChannel");
    $r->addRoute("rankingCanalesVenta", "POST", "controller", "saleChannelRanking");
    */

    //DEFAULT
    $r->setDefaultRoute("controller", "dashboardController");

    //RUN
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 