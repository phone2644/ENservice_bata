 $dropzone_file = $request->file('dropzone_file');
        if (empty($dropzone_file)) {
            $imagecontent = $dropzone_file;
        } else {

            $dropzone_file = $request->file('dropzone_file');
            //เก็บ=ชื่อรูปภาพ
            $name_gen = hexdec(uniqid());
            //เก็บนามสกุลรูป
            $img_ext = strtolower($dropzone_file->getClientOriginalExtension());

            $img_name = $name_gen . '.' . $img_ext;
            //เก็บตำแหน่งภาพ
            $upload_location = 'image/images_problem/';
            $full_path = $upload_location . $img_name;
            //เก็บตำแหน่งภาพกับชื่อมารวม และย้ายไฟล์ image/content/1765924517996855.jpg
            $dropzone_file->move($upload_location, $img_name);
            $imagecontent = $full_path;
        }