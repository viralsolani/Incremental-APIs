<?php

class lessionsTest extends ApiTester
{
    /** @test */
    public function it_fetches_lessions()
    {
        $this->makeLesson();

        $this->getJson('api/v1/lessions');

        $this->assertResponseOk();
    }

    /** @test */
    public function it_fetches_a_single_lesson()
    {
        $this->makeLesson();

        $lesson = $this->getJson('api/v1/lessions/1')->data;

        $this->assertResponseOk();
        $this->assertObjectHasAttributes($lesson, 'body', 'title');
    }

    /** @test */
    public function it_404s_if_a_lesson_is_not_found()
    {
        $this->getJson('api/v1/lessions/x');

        $this->assertResponseStatus(404);
    }

    private function makeLesson($lessonFields = [])
    {
        $lesson = array_merge([
            'title'     => $this->fake->sentence,
            'body'      => $this->fake->paragraph,
            'some_bool' => $this->fake->boolean,
        ], $lessonFields);

        while ($this->times--) {
            App\Lession::create($lesson);
        }
    }
}
