@component('mail::message')
# Thông báo cập nhật trạng thái đơn hàng

Xin chào,

Trạng thái của đơn hàng {{ $order->id }} đã được cập nhật.

- **Trạng thái cũ:** {{ $oldStatus }}
- **Trạng thái mới:** {{ $newStatus }}

Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.

Trân trọng,
{{ config('app.name') }}
@endcomponent