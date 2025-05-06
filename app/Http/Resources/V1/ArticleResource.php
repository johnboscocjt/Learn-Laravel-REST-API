<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    // some methods from article model

    public static $wrap = 'articles';

    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
          'type' => 'articles',
          'id' => $this->id(),
          'atrributes' => [
              'title' => $this->title(),
              'slug' => $this->slug(),
              'body' => $this->body(),
              'created_at' => $this->created_at,
          ],
          'relationships' => [
                 'author' => AuthorResource::make($this->author()),
          ],
          'links' => [
                'self' => route('articles.show', $this->id()),
                'related' => route('articles.show', $this->slug()),
          ],
          
        ];


    }

    public function with($request){
        return [
            'status' => 'success',
        ];
    }

    public function withResponse($request, $response)
    {
        $response->header('Accept', 'application/json');
    }
}
