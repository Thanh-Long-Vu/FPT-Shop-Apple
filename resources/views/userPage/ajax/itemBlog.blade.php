@if(isset($list_blog) && !empty($list_blog))
    @foreach($list_blog as $blog)
        <div class="col-lg-6">
            <article class="card mb-13 border-0">
                <a href="{{route("blog.user.detail",["idBlog" => $blog->id_blog ?? 0])}}" class="d-block">
                    <img class="img-fluid" src="../{{$blog->avatar ?? ""}}" alt="Image Description">
                </a>
                <div class="card-body pt-5 pb-0 px-0">
                    <h4 class="mb-3"><a href="">{{$blog->title ?? ""}}</a></h4>
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="list-group list-group-horizontal flex-wrap list-group-borderless align-items-center mx-n0dot5">
                                                <span class="mx-2 font-size-n5 mt-1 text-gray-5">
                                                    <i class="fas fa-circle"></i>
                                                </span>
                            <a href="{{route("blog.user.detail",["idBlog" => $blog->id_blog ?? 0])}}"
                               class="mx-0dot5 text-gray-5">
                                {{date_format($blog->updated_at ?? new Date(),"F d, Y")}}
                            </a>
                        </div>
                    </div>
                    <p>{{$blog->description ?? ""}}</p>
                    <div class="flex-horizontal-center">
                        <a href="{{route("blog.user.detail",["idBlog" => $blog->id_blog ?? 0])}}"
                           class="btn btn-soft-secondary-w mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5">Read More</a>
                        {{--                                            <a href="../blog/single-blog-post.html" class="font-size-12 text-gray-5 ml-4"><i--}}
                        {{--                                                    class="far fa-comment"></i> Leave a comment</a>--}}
                    </div>
                </div>
            </article>
        </div>
    @endforeach
@endif

