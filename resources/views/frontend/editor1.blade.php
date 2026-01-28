@extends('frontend.master')

@section('title', 'Editor1 Page')

@section('styles')
    <style>
        .navbar {
            background: rgba(243, 244, 246, 1);
        }
    </style>
@endsection

@section('content')
    <div class="wr_main" class="vh-100" style="padding-top: 100px;">
        <div class="sidenav">
            @include('frontend.layouts.sidenav')
        </div>

        <div class="editor-section">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="fw-bold mb-0">
                                    <i class="fa-solid fa-code me-2"></i>{{ $language->display_name }} Editor
                                </h5>

                                <div class="d-flex gap-2">
                                    <button id="fullscreenBtn" class="btn btn-secondary btn-sm"><i
                                            class="fa-solid fa-expand"></i></button>
                                    <button id="shareBtn" class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-share-nodes me-1"></i> Share
                                    </button>
                                    <button id="runBtn" class="btn btn-primary btn-sm"><i
                                            class="fas fa-play me-1"></i>Run</button>
                                </div>
                            </div>

                            <div id="code-editor"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h5 class="fw-bold mb-0">
                                    <i class="fas fa-terminal me-2"></i>User Inputs
                                </h5>

                                <button id="clearBtn" class="btn btn-danger btn-sm">
                                    Clear
                                </button>
                            </div>

                            <div class="mb-5">
                                <textarea id="userInput" class="form-control" rows="3" placeholder="Please enter inputs"></textarea>
                            </div>



                            <div class="mb-3">
                                <h5 class="fw-bold mb-0">
                                    <i class="fa-solid fa-tv me-2"></i>Output
                                </h5>

                            </div>

                            <div class="mb-3">
                                <pre></pre>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.45.0/min/vs/loader.min.js"></script>

    <script>
        require.config({
            paths: {
                vs: 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.45.0/min/vs'
            }
        });

        require(['vs/editor/editor.main'], function() {
            window.editor = monaco.editor.create(document.getElementById('code-editor'), {
                value: ``,
                language: 'javascript',
                theme: 'vs',
                automaticLayout: true,
                fontSize: 14,
                minimap: {
                    enabled: true
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#fullscreenBtn').click(function() {
                $('.wr_main').toggleClass('fullscreen');
            });
        });
    </script>
@endsection
