<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurveyService;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class SurveyServiceController extends Controller
{
    public function index()
    {
       // dd('test');
        $services = SurveyService::latest()->get();
        return view('backend.services.index', compact('services'));
    }

    public function create()
    {
        return view('backend.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'short_des' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'link' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new GdDriver());
            $filename = time() . '_' . $image->getClientOriginalName();
            $manager->read($image->getPathname())->resize(370, 250)->save(public_path('uploads/survey_services/' . $filename));
            $data['image'] = 'uploads/survey_services/' . $filename;
        }

        SurveyService::create($data);

        return redirect()->route('admin.survey.services.index')->with('success', 'Service added!');
    }

    public function edit($id)
    {
        $service = SurveyService::findOrFail($id);
        return view('backend.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = SurveyService::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'short_des' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'link' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }

            $image = $request->file('image');
            $manager = new ImageManager(new GdDriver());
            $filename = time() . '_' . $image->getClientOriginalName();
            $manager->read($image->getPathname())->resize(600, 400)->save(public_path('uploads/survey_services/' . $filename));
            $data['image'] = 'uploads/survey_services/' . $filename;
        }

        $service->update($data);
        return redirect()->route('admin.survey.services.index')->with('success', 'Service updated successfully!');
       
    }


    public function destroy($id)
{
    $service = SurveyService::findOrFail($id);

    // Delete image if exists
    if ($service->image && file_exists(public_path($service->image))) {
        unlink(public_path($service->image));
    }

    $service->delete();

    return redirect()->route('admin.survey.services.index')->with('success', 'Service deleted!');
}

}
