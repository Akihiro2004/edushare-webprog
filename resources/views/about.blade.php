@extends('layout')
@section('content')

<div class="relative min-h-[45vh]">
   <div class="absolute inset-0 bg-gradient-to-b from-[#1E2A4A] to-[#4A1E6A]">
       <div class="absolute inset-0 bg-black/30"></div>
   </div>

   <div class="relative z-10 flex flex-col justify-center min-h-[45vh]">
       <div class="text-center max-w-3xl mx-auto px-6">
           <h1 class="text-6xl font-extrabold mb-6 text-white drop-shadow-lg">
               About EduShare
               <div class="w-32 h-1 bg-white mx-auto mt-4"></div>
           </h1>
           <p class="text-lg text-gray-200 leading-relaxed font-medium max-w-2xl mx-auto">
               At EduShare, our mission is to democratize access to quality education. We believe education is a fundamental right, not a privilege.
           </p>
       </div>
   </div>
</div>

<div class="bg-white">
   <div class="max-w-7xl mx-auto px-6 py-16">
       <div class="grid lg:grid-cols-2 gap-16 items-center mb-20">
           <div>
               <h2 class="text-4xl font-bold mb-8 text-[#1E2A4A]">Our Vision</h2>
               <p class="text-lg text-gray-600 leading-relaxed">
                   We envision a world where knowledge knows no boundaries, and every individual has equal access to resources that enable personal growth and global progress. By supporting <strong class="text-[#4A1E6A]">Sustainable Development Goal 4 (SDG 4)</strong>: Quality Education for All, we strive to bridge the gap in educational accessibility and create opportunities for all learners, everywhere.
               </p>
           </div>
           <div>
               <img src="{{ asset('AboutPage/vision.png') }}" alt="SDG 4 Logo" class="rounded-2xl shadow-xl w-full object-cover h-[400px]">
           </div>
       </div>

       <div class="grid lg:grid-cols-2 gap-16 items-center">
           <div>
               <img src="{{ asset('AboutPage/mission.png') }}" alt="Mission" class="rounded-2xl shadow-xl w-full object-cover h-[400px]">
           </div>
           <div>
               <h2 class="text-4xl font-bold mb-8 text-[#1E2A4A]">Our Mission</h2>
               <p class="text-lg text-gray-600 leading-relaxed">
                   At EduShare, our mission is to democratize access to quality education. We believe education is a fundamental right, not a privilege. By providing free educational resources to everyone, we aim to empower individuals, inspire lifelong learning, and contribute to building a more equitable world.
               </p>
           </div>
       </div>
   </div>
</div>

<div class="bg-white">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <h2 class="text-4xl font-bold text-center mb-14 text-[#1E2A4A]">What is EduShare?</h2>

        <div class="grid md:grid-cols-3 gap-12">
            <a href="{{ route('books') }}" class="group bg-white rounded-2xl p-8 text-center transition-all duration-300 hover:shadow-xl border border-gray-100">
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 bg-[#1E2A4A] rounded-full flex items-center justify-center transition-transform group-hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold mb-3 text-[#1E2A4A]">Free Books</h3>
                <p class="text-base text-gray-600 mb-4">Download educational books spanning a wide range of subjects.</p>
                <span class="text-[#4A1E6A] font-medium inline-block">Learn more</span>
            </a>

            <a href="{{ route('videos') }}" class="group bg-white rounded-2xl p-8 text-center transition-all duration-300 hover:shadow-xl border border-gray-100">
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 bg-[#1E2A4A] rounded-full flex items-center justify-center transition-transform group-hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold mb-3 text-[#1E2A4A]">Educational Videos</h3>
                <p class="text-base text-gray-600 mb-4">Watch curated videos that enhance your learning journey.</p>
                <span class="text-[#4A1E6A] font-medium inline-block">Learn more</span>
            </a>

            <a href="{{ route('welcome') }}" class="group bg-white rounded-2xl p-8 text-center transition-all duration-300 hover:shadow-xl border border-gray-100">
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 bg-[#1E2A4A] rounded-full flex items-center justify-center transition-transform group-hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold mb-3 text-[#1E2A4A]">Resource Library</h3>
                <p class="text-base text-gray-600 mb-4">Access a growing repository of materials tailored to meet diverse learning needs.</p>
                <span class="text-[#4A1E6A] font-medium inline-block">Learn more</span>
            </a>
        </div>
    </div>
</div>

<div class="bg-white">
   <div class="max-w-7xl mx-auto px-6 py-16">
       <div class="grid lg:grid-cols-2 gap-16 items-center">
           <div>
               <img src="{{ asset('AboutPage/whywedo.png') }}" alt="Our Impact" class="rounded-2xl shadow-xl w-full object-cover h-[400px]">
           </div>
           <div>
               <h2 class="text-4xl font-bold mb-8 text-[#1E2A4A]">Why We Do This</h2>
               <p class="text-lg text-gray-600 leading-relaxed mb-6">
                   Education transforms lives. Yet, millions around the world face barriers to accessing learning resources due to financial, geographical, or societal constraints. At EduShare, we are committed to removing those barriers by offering completely free, high-quality educational content.
               </p>
               <p class="text-lg text-gray-600 leading-relaxed">
                   Supporting <strong class="text-[#4A1E6A]">Sustainable Development Goal 4</strong>, we recognize that education is key to solving global challenges, reducing inequalities, and unlocking human potential. EduShare is our contribution to this vital mission.
               </p>
           </div>
       </div>
   </div>
</div>

<div class="bg-white">
   <div class="max-w-7xl mx-auto px-6 py-16">
       <h2 class="text-4xl font-bold text-center mb-14 text-[#1E2A4A]">Meet the Team</h2>
       <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-16">
           <div class="text-center">
               <img src="{{ asset('AboutPage/Kairos.png') }}" alt="Team Member 1"
                    class="w-32 h-32 rounded-full object-cover mx-auto mb-4">
               <h3 class="text-lg font-semibold mb-1 text-[#1E2A4A]">Kairos Abinaya Susanto</h3>
               <p class="text-gray-500">Co-Founder</p>
           </div>

           <div class="text-center">
               <img src="{{ asset('AboutPage/Darrien.png') }}" alt="Team Member 2"
                    class="w-32 h-32 rounded-full object-cover mx-auto mb-4">
               <h3 class="text-lg font-semibold mb-1 text-[#1E2A4A]">Darrien Rafael Wijaya</h3>
               <p class="text-gray-500">Co-Founder</p>
           </div>

           <div class="text-center">
               <img src="{{ asset('AboutPage/George.png') }}" alt="Team Member 3"
                    class="w-32 h-32 rounded-full object-cover mx-auto mb-4">
               <h3 class="text-lg font-semibold mb-1 text-[#1E2A4A]">George Maximillian Theodore</h3>
               <p class="text-gray-500">Co-Founder</p>
           </div>

           <div class="text-center">
               <img src="{{ asset('AboutPage/Matthew.png') }}" alt="Team Member 4"
                    class="w-32 h-32 rounded-full object-cover mx-auto mb-4">
               <h3 class="text-lg font-semibold mb-1 text-[#1E2A4A]">Matthew Owen</h3>
               <p class="text-gray-500">Co-Founder</p>
           </div>
       </div>
   </div>
</div>

@endsection
