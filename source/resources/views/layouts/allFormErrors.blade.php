@if(!$errors->createThreadErrors->isEmpty())
                                        <script>
                                            $(function() {
                                                $('#myModalThread').modal('show');
                                            });
                                        </script>
                                        <ul>
                                            @foreach ($errors->createThreadErrors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @elseif(!$errors->createPostErrors->isEmpty())
                                        <script>
                                            $(function() {
                                                $('#myModalPost').modal('show');
                                            });
                                        </script>
                                        <ul>
                                            @foreach ($errors->createPostErrors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif