<div>
    <form wire:submit.prevent="save">
        <div class="row">
            <div class="col-sm-10">
                <div class="mb-3">

                    <x-input-label for="post_image" :value="__('Post Image')" />

                    <x-text-input id="post_image" wire:model="post_image"
                        class=" {{ $errors->get('post_image') ? 'is-invalid' : '' }}" type="file" name="post_image"
                        autofocus />


                    @if ($post_image)
                        <div class="mt-3">
                            <img src="{{ $post_image->temporaryUrl() }}" class="img-responsive border border-1"
                                style="width:100px;height:100px;">
                        </div>
                    @endif

                </div>
            </div>
            @if ($post_image_main)
                <div class="mt-3 col-sm-2"><img src="{{ asset('storage/' . $post_image_main) }}"
                        class="img-thumbnail img-fluid img-responsive w-10"></div>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">

                    <x-input-label for="blogcat" :value="__('Blog Category')" />
                    <x-select id="blogcat" :options="$blogcat" :optionget="'category_name'" wire:model.live="blogcat_id"
                        class="{{ $errors->get('blogcat') ? 'is-invalid' : '' }}" name="blogcat"
                        placeholder="Select Blog Category" />
                    <x-input-error :messages="$errors->get('blogcat')" />
                </div>
            </div><!-- Col -->

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <x-input-label for="post_title" :value="__('Post Title')" />
                    <x-text-input id="post_title" wire:model="post_title"
                        class="{{ $errors->get('post_title') ? 'is-invalid' : '' }}" type="text" name="post_title"
                        placeholder="Post Title" />
                    <x-input-error :messages="$errors->get('post_title')" />
                </div>
            </div><!-- Col -->

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <x-input-label for="short_descp" :value="__('Short Description')" />
                    <x-textarea-input id="short_descp" wire:model="short_descp"
                        class="{{ $errors->get('short_descp') ? 'is-invalid' : '' }}" type="text" name="short_descp"
                        placeholder="Short Description" />

                </div>
            </div><!-- Col -->

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <x-input-label for="long_descp" :value="__('Long Description')" />
                    <x-textarea-input id="tinymceExample" wire:model="long_descp"
                        class="{{ $errors->get('long_descp') ? 'is-invalid' : '' }}" type="text" name="long_descp"
                        placeholder="Long Description" />

                </div>
            </div><!-- Col -->

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="mb-3">
                    <x-input-label for="post_tags" :value="__('Blog Tags')" />
                    <x-select id="blogtags" :options="$blogtags" :optionget="'tag_name'" wire:model.live="post_tags_ids"
                        class="taggings" multiple="true" type="text" name="blogtags" placeholder="Blog Tags" />
                    {{-- @json($post_tags_ids); --}}
                </div>
            </div><!-- Col -->

        </div>
        <div>
            <x-primary-button class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>

</div>
