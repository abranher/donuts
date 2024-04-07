<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageProfileController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request)
  {
    $user = $request->user();
    if ($user->image_profile == '20240118xgWsT1W1FHcPP5k7gWhT3rm7Qr8fyHdHpURJ5sg5oTpoy.jpg') {
      $path = $request->file('image_profile')->store('/', 'images_profile');
      $user->image_profile = $path;
      $user->save();

      return to_route('profile.show')->with('status', 'Imagen de perfil cambiada exitosamente!');
    } else {
      Storage::disk('images_profile')->delete($user->image_profile);

      $path = $request->file('image_profile')->store('/', 'images_profile');
      $user->image_profile = $path;
      $user->save();

      return to_route('profile.show')->with('status', 'Imagen de perfil cambiada exitosamente!');
    }
  }
}
