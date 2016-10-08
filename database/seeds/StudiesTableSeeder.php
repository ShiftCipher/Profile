<?php

use Illuminate\Database\Seeder;

class StudiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Study::class)->create([
        'name' => 'Bachelor Degree in Systems Engineering',
        'company' => 'UNAD',
        'start' => '2016-10-17',
        'end' => '2017-10-17',
        'url' => 'https://estudios.unad.edu.co/ingenieria-de-sistemas/acerca-del-programa',
        'description' => 'The Software Systems Engineering is to contribute to education for all in the form of distance education and relying on the use of information and communications technology, to train professionals to help generate solutions to the problems in the field of information, computing, and communications systems with a solid foundation autonomous, ethical, entrepreneurial spirit and solidarity, supporting communities with technological proposals at the local, regional and international levels.'
      ]);

      factory(App\Study::class)->create([
        'name' => 'Associate Degree in IT Systems Analysis and Development',
        'company' => 'SENA',
        'start' => '2015-07-17',
        'end' => '2017-07-17',
        'url' => 'https://www.youtube.com/watch?v=IYod0Jk0R8M',
        'description' => 'Created to provide the national productive sector in general, the possibility of incorporating people with high labor and professional qualities that contribute to economic, social and technological development of their environment and the country, also offer apprenticeship training in technologies related to the entire cycle life Software including the stages of Analysis, Design, Development, Implementation, Testing and Maintenance, and skills related to the processes of technological negotiation and quality in software development, very important factors for competitiveness and effective positioning of this industry around the world.'
      ]);

      factory(App\Study::class)->create([
        'name' => 'Mobile Technology Entrepreneurship',
        'company' => 'MIT Global Startup Labs',
        'start' => '2013-06-17',
        'end' => '2013-07-26',
        'url' => 'http://gsl.mit.edu/program/colombia-summer-2013/',
        'description' => 'MIT Global Startup Labs is a multidisciplinary group of MISTI (MIT International Science and Technology Initiatives) that promotes development in emerging regions by cultivating young technology entrepreneurs. We develop curriculum materials, software technologies, platforms, and networks that enable undergraduate students in emerging regions to innovate in the area of information and communication technologies (ICTs).',
      ]);

      factory(App\Study::class)->create([
        'name' => 'Undergraduate Architecture',
        'company' => 'University of Valle',
        'start' => '2009-09-02',
        'end' => '2019-09-02',
        'description' => 'The Academic Program Undergraduate Architecture is a program of general order, forming professionals one of the most basic areas of professional activity as is the discipline of architecture, through which the natural and artificial environment becomes which man lives, through planning, design, construction and maintenance of spaces that supply needs of functional order, in addition to other aesthetic and symbolic. These works are located on different scales, from the individual place, through the immediate building, the neighborhood, the city and the territory. Architectural studies provide the conceptual tools and techniques necessary for the execution of these works.',
      ]);
    }
}
