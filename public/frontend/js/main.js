$(function () {
    $('.khoisanpham').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1400,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    //hieu ung header va nut backtotop
    $("#backtotop").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 400);
    });

    $(window).scroll(function () {
        if ($("body,html").scrollTop() > 150) {
            $(".navbar").addClass("fixed-top");
        }
        else {
            $(".navbar").removeClass("fixed-top");
        }
    });

    $(window).scroll(function () {
        if ($("body,html").scrollTop() > 500) {
            $(".nutcuonlen").addClass("hienthi");
        }
        else {
            $(".nutcuonlen").removeClass("hienthi");
        }
    });

    // header form dangnhap dangky
    $(".nutdangnhap").click(function (e) {
        $("ul.tabs .tab-dangnhap").addClass("active");
    });
    $(".nutdangky").click(function (e) {
        $("ul.tabs .tab-dangky").addClass("active");
    });

    $("ul.tabs .tab-dangnhap").click(function (e) {
        $("ul.tabs .tab-dangnhap").addClass("active");
        $("ul.tabs .tab-dangky").removeClass("active");
    });

    $("ul.tabs .tab-dangky").click(function (e) {
        $("ul.tabs .tab-dangky").addClass("active");
        $("ul.tabs .tab-dangnhap").removeClass("active");
    });

    // form dangnhap dangky
    $(".tab-dangky").click(function (e) {
        $('#formdangnhap').removeClass("fade");
        $('#formdangky').removeClass("fade");
        $('#formdangnhap').modal("hide");
        $('#formdangky').modal("show");
    });
    $(".tab-dangnhap").click(function (e) {
        $('#formdangnhap').removeClass("fade");
        $('#formdangky').removeClass("fade");
        $('#formdangky').modal("hide");
        $('#formdangnhap').modal("show");
    });
    $(".close").click(function (e) {
        $('.modal').addClass("fade");
        $("ul.tabs .tab-dangnhap").removeClass("active");
        $("ul.tabs .tab-dangky").removeClass("active");
    });

    // thumb-img
    $(".thumb-img.thumb1").addClass('vienvang');
    $('.thumb-img').click(function (e) {
        $('.product-image').attr('src', this.src);
    });

    $('.thumb-img').click(function (e) {
        $('.thumb-img:not(:hover)').removeClass('vienvang');
        $(this).addClass('vienvang');
    });

    //btn-spin
    $(".btn-inc").click(function (e) {
        var strval = $(this).parent().prev().val();
        var val = parseInt(strval) + 1;
        $(this).parent().prev().attr('value', val);
    });
    $(".btn-dec").click(function (e) {
        var strval = $(this).parent().next().val();
        var val = parseInt(strval) - 1;
        if (val < 1) {
            $(this).parent().next().attr('value', 1);
        } else {
            $(this).parent().next().attr('value', val);
        }
    });

    // gui danh gia
    $(".formdanhgia").hide(200);
    $(".vietdanhgia").click(function (e) {
        $(".formdanhgia").toggle(200);
    });




    //rotate chevron
    $('#step1contentid').on('show.bs.collapse', function () {
        $(this).prev().addClass("active");
    })
    $('#step1contentid').on('hide.bs.collapse', function () {
        $(this).prev().removeClass("active");
    })
    $('#step2contentid').on('show.bs.collapse', function () {
        $(this).prev().addClass("active");
    })
    $('#step2contentid').on('hide.bs.collapse', function () {
        $(this).prev().removeClass("active");
    })
    $('#step3contentid').on('show.bs.collapse', function () {
        $(this).prev().addClass("active");
    })
    $('#step3contentid').on('hide.bs.collapse', function () {
        $(this).prev().removeClass("active");
    })

    // nut btn-shopping-without-signup
    $("#step1contentid").collapse('show');
    $(".btn-shopping-without-signup").click(function (e) {
        $("#step1contentid").collapse('hide');
        $("#step2contentid").collapse('show');
    });

    // validate
    $("#form-signup").validate({
        rules: {
            name: {
                required: true,
            },
            phone: {
                required: true,
                minlength: 8
            },
            password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: "#inputPassword"
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            name: {
                required: "Vui lòng nhập họ và tên",
            },
            phone: {
                required: "Vui lòng nhập số điện thoại",
                minlength: "Số máy quý khách vừa nhập là số không có thực"
            },
            password: {
                required: 'Vui lòng nhập mật khẩu',
                minlength: 'Vui lòng nhập ít nhất 6 kí tự'
            },
            confirm_password: {
                required: 'Vui lòng nhập lại mật khẩu',
                minlength: 'Vui lòng nhập ít nhất 6 kí tự',
                equalTo: 'Mật khẩu không trùng'
            },
            email: {
                required: "Vui lòng nhập email",
                minlength: "Email không hợp lệ",
                email: "Vui lòng nhập email",
            }
        }
    });

    $("#form-signin").validate({
        rules: {
            password: {
                required: true,
                minlength: 6
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            password: {
                required: 'Vui lòng nhập mật khẩu',
                minlength: 'Vui lòng nhập ít nhất 6 kí tự'
            },
            email: {
                required: "Vui lòng nhập email",
                minlength: "Email không hợp lệ",
                email: "Vui lòng nhập email",
            }
        }
    });

    $("#form-signup-cart").validate({
        rules: {
            name: {
                required: true,
            },
            phone: {
                required: true,
                minlength: 8
            },
            password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: "#inputPassword"
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            name: {
                required: "Vui lòng nhập họ và tên",
            },
            phone: {
                required: "Vui lòng nhập số điện thoại",
                minlength: "Số máy quý khách vừa nhập là số không có thực"
            },
            password: {
                required: 'Vui lòng nhập mật khẩu',
                minlength: 'Vui lòng nhập ít nhất 6 kí tự'
            },
            confirm_password: {
                required: 'Vui lòng nhập lại mật khẩu',
                minlength: 'Vui lòng nhập ít nhất 6 kí tự',
                equalTo: 'Mật khẩu không trùng'
            },
            email: {
                required: "Vui lòng nhập email",
                minlength: "Email không hợp lệ",
                email: "Vui lòng nhập email",
            }
        }
    });

    $("#form-signin-cart").validate({
        rules: {
            password: {
                required: true,
                minlength: 6
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            password: {
                required: 'Vui lòng nhập mật khẩu',
                minlength: 'Vui lòng nhập ít nhất 6 kí tự'
            },
            email: {
                required: "Vui lòng nhập email",
                minlength: "Email không hợp lệ",
                email: "Vui lòng nhập email",
            }
        }
    });

    // add to cart
    let product =
        {
            name: $('.khoithongtin .ten').text(),
            tag: $('.product-image').attr("alt"),
            price: parseFloat($('.gia span.giamoi').text()),
            old_price:parseFloat($('.gia span.giacu').text()),
            inCart: 0
        }

    let carts = document.querySelector('.nutmua');
    if (carts) {
        carts.addEventListener('click', () => {
            cartNumbers(product);
            totalCost(product);
        })
    }

    function onLoadCartNumbers() {
        let productNumbers = localStorage.getItem('cartNumbers');
        if (productNumbers) {
            document.querySelector('.giohang .cart-amount').textContent = productNumbers;
        }
    }

    function cartNumbers(product) {

        let productNumbers = localStorage.getItem('cartNumbers');
        productNumbers = parseInt(productNumbers);

        if (productNumbers) {
            localStorage.setItem('cartNumbers', productNumbers + parseInt($(".soluongsp").val()));
            document.querySelector('.giohang .cart-amount').textContent = productNumbers + parseInt($(".soluongsp").val());
        } else {
            localStorage.setItem('cartNumbers', parseInt($(".soluongsp").val()));
            document.querySelector('.giohang .cart-amount').textContent = parseInt($(".soluongsp").val());
        }
        setItem(product);
    }

    function setItem(product) {
        let cartItems = localStorage.getItem('productsInCart');
        cartItems = JSON.parse(cartItems);

        if (cartItems != null) {
            if (cartItems[product.tag] == undefined) {
                cartItems = {
                    ...cartItems,
                    [product.tag]: product
                }
            }
            cartItems[product.tag].inCart += parseInt($(".soluongsp").val());
        } else {
            product.inCart = parseInt($(".soluongsp").val());
            cartItems = {
                [product.tag]: product
            }
        }

        localStorage.setItem('productsInCart', JSON.stringify(cartItems));
    }

    function totalCost(product) {
        let cartCost = localStorage.getItem('totalCost');

        if (cartCost != null) {
            cartCost = parseFloat(cartCost);
            localStorage.setItem('totalCost', cartCost + parseInt($(".soluongsp").val()) * product.price);
        } else {
            localStorage.setItem('totalCost', parseInt($(".soluongsp").val()) * product.price);
        }
    }

    function displayCart() {
        let cartItems = localStorage.getItem("productsInCart");
        cartItems = JSON.parse(cartItems);
        let cartContent = document.querySelector(".cart-content");
        let cartCost = localStorage.getItem('totalCost');
        let productNumbers = localStorage.getItem('cartNumbers');

        if (cartItems == null) {
            $(".cart-empty").removeClass("d-none");
            $('.cart').addClass('d-none');
            $('.cart-steps').addClass('d-none');
        }
    }

    $(".btn-checkout").click(function (e) {
        alert("cảm ơn đã mua hàng");
    });

    onLoadCartNumbers();
    displayCart()

    $('.items .row').isotope({
        itemSelector:'.item',
    })

    $('.tag a').click(function (e) {
        var tacgia = $(this).data('tacgia');

        if(tacgia == 'all'){
            $('.items .row').isotope({filter:'*'})
        }else{
            $('.items .row').isotope({filter:tacgia});
        }
        return false;
    });

    $('.thay-doi-mk').hide();
    $("#changepass").click(function (e) {
        $('.thay-doi-mk').toggle(200);
    });

});
