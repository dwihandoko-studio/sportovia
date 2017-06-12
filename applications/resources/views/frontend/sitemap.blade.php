@php echo'<?xml version="1.0" encoding="UTF-8"?>'; @endphp

<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>{{ url('') }}</loc>
    </url>

    <url>
        <loc>{{ url('') }}/about/us</loc>
    </url>

    <url>
      <loc>{{ url('') }}/about/staff</loc>
    </url>

    <url>
        <loc>{{ url('') }}/news-event</loc>
    </url>
    @foreach ($getNews as $news)

    <url>
        <loc>{{ url('') }}/news-event/{{ $news->slug }}</loc>
    </url>
    @endforeach

    <url>
        <loc>{{ url('') }}/contact</loc>
    </url>
    @foreach ($getProgram as $program)

    <url>
        <loc>{{ url('') }}/program-class/{{ $program->slug }}</loc>
    </url>
    @endforeach
    @foreach ($getKelasKategori as $kategori)

    <url>
        <loc>{{ url('') }}/{{ $kategori->slug }}</loc>
    </url>
    @endforeach

    @foreach ($getKelas as $kelas)
    <url>
      <loc>{{ url('')}}/{{ $kelas->kelasKategori->slug}}/{{ $kelas->slug }}</loc>
    </url>
    @endforeach

</urlset>
