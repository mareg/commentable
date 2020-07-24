# commentable

Example for [Architecture question](https://github.com/mareg/trainstation/issues/1)

## Installation

Requires docker and docker-compose to run.

To start run:

```bash
$ composer install -n -o
$ docker-compose up -d
```

## Usage

GET http://localhost:8088/posts

will list latest posts, e.g.:
```json
{
  "posts": [
    {
      "identifier": "45fe8b50-787d-457f-a6d5-b06a97afd510",
      "subject": "first post",
      "body": "some text",
      "created_at": "2020-07-24 14:39:02",
      "updated_at": "2020-07-24 14:39:02"
    }
  ]
}
```

GET http://localhost:8088/posts/45fe8b50-787d-457f-a6d5-b06a97afd510

will retrieve post with latest comments:

```json
{
  "post": {
    "identifier": "45fe8b50-787d-457f-a6d5-b06a97afd510",
    "subject": "first post",
    "body": "some text",
    "created_at": "2020-07-24 14:39:02",
    "updated_at": "2020-07-24 14:39:02"
  },
  "comments": [
    {
      "identifier": "098f7bfd-4127-4beb-900d-90a453511a78",
      "comment": "this is my comment",
      "author": "xx",
      "created_at": "2020-07-24 15:25:04"
    },
    {
      "identifier": "6f7cbf1a-41b3-4ef4-8943-aa243320692c",
      "comment": "marek",
      "author": "this is my comment",
      "created_at": "2020-07-24 16:13:11"
    },
    {
      "identifier": "db486827-0e5e-40f4-b23d-1417c3d32cad",
      "comment": "marek",
      "author": "this is my comment",
      "created_at": "2020-07-24 16:13:21"
    }
  ]
}
```

POST http://localhost:8088/posts/45fe8b50-787d-457f-a6d5-b06a97afd510/comment

with json payload:

```json
{
    "author": "marek",
    "comment": "this is my comment"
}
```

will create a new comment on the post.

Same for videos.