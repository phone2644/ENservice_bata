<div class="rounded-full red Center" style="opacity: 0.8; width: 2.3rem;background: #b30505e0;height: 2.3rem; top: -18px;right: -14px;color: white; border:1px solid white;display: flex;position: absolute; z-index: 10;">
    @foreach (Auth::user()->unreadNotifications as $notification) 
    @if($notification->data['floor_id'] == $Newmassage && empty($notification->read_at))
    <div id="massage" class="rounded-full Center" style="height: 1rem; width: 2.5rem; background-color: #f00; top: -2px;right: -25px;position: absolute;border: 1px solid white;opacity: 0.9; z-index: 10;"><p style="font-size: initial;display: ruby-text-container; margin-bottom: 5.5%;">New</p></div>    
    @endif  
    @endforeach 
    <p class=" Center" style="font-size: clamp(17px, 1.5vw, 20px); ">