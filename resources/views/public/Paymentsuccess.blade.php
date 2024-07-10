@include('public.header.index')
  <style>
    .checkmark {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      display: inline-block;
      stroke-width: 2;
      stroke: #4bb71b;
      stroke-miterlimit: 10;
      box-shadow: inset 0px 0px 0px #4bb71b;
      animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
      position: relative;
      margin-right: 20px;
    }

    .checkmark__circle {
      stroke-dasharray: 200;
      stroke-dashoffset: 200;
      stroke-width: 2;
      stroke-miterlimit: 100;
      stroke: #4bb71b;

      animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }

    .checkmark__check {
  transform-origin: 50% 50%;
  stroke-dasharray: 48;
  stroke-dashoffset: 48;
  animation: stroke .3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
  position: relative;
  top: -82px;
}

    @keyframes stroke {
      100% {
        stroke-dashoffset: 0;
      }
    }

    @keyframes scale {
      0%,
      100% {
        transform: none;
      }

      10% {
        transform: scale3d(1.1, 1.1, 1);
      }

      30% {
        transform: scale3d(0.9, 0.9, 1);
      }

      50% {
        transform: scale3d(1.05, 1.05, 1);
      }

      57% {
        transform: scale3d(1, 1, 1);
      }
    }

    @keyframes fill {
      100% {
        box-shadow: inset 0px 0px 0px 5px #4bb71b;
      }
    }
  </style>
</head>

<div class="flex items-center justify-center h-screen p-10">
  <div class="text-center">
    <div class="checkmark">
      <svg class="checkmark__circle" viewBox="0 0 166 166">
        <circle cx="83" cy="83" r="80" fill="none" />
      </svg>
      <svg class="checkmark__check" viewBox="0 0 48 48">
        <path d="M14.1 27.2l7.1 7.2 16.7-16.8" fill="none" />
      </svg>
    </div>
    <h2 class="text-2xl font-bold mt-8">Thanh toán thành công!</h2>
    <p class="text-gray-500">Chúng tôi đã nhận được thanh toán của bạn.</p>
    <div class="flex items-center mt-3 justify-center">
      <a type="submit" href="{{route('home')}}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 mr-5 rounded">Quay Về Trang Chủ</a>
    </div>
  </div>
</div>
  @include('public.footer.footer')