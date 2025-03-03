<div wire:ignore.self class="modal fade" id="formModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form wire:submit.prevent="{{ $submitMethod }}">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="product_id">Product</label>
                                <select class="form-select" id="product_id" name="product_id" wire:model="form.product_id" required>
                                    <option value="" selected>Choose a product!</option>
                                    @foreach ($product_series as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @error('form.product_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="card_type">Type</label>
                                <select class="form-select" id="card_type" name="card_type" wire:model.live="form.card_type" required>
                                    <option value="" selected>Choose a card type!</option>
                                    @foreach ($card_types as $card_type)
                                        <option value="{{ $card_type->value }}">{{ $card_type->displayText() }}</option>
                                    @endforeach
                                </select>
                                @error('form.card_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="color_type">Color</label>
                                <select class="form-select" id="color_type" name="color_type" wire:model="form.color_type" @if(in_array($form->card_type, ['action_point'])) disabled @endif>
                                    <option value="" selected>None</option>
                                    @foreach ($color_types as $color_type)
                                        <option value="{{ $color_type->value }}">{{ $color_type->displayText() }}</option>
                                    @endforeach
                                </select>
                                @error('form.color_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="card_number">Card Number</label>
                                <input type="text" class="form-control @error('form.card_number') is-invalid @enderror" id="card_number" name="card_number" wire:model.live="form.card_number" autocomplete="off" required>
                                @error('form.card_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('form.name') is-invalid @enderror" id="name" name="name" wire:model.live="form.name" autocomplete="off" @if(in_array($form->card_type, ['action_point'])) disabled @endif>
                                @error('form.name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" wire:model.live="form.description" rows="3" @if(in_array($form->card_type, ['action_point'])) disabled @endif></textarea>
                                @error('form.description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="note">Note</label>
                                <textarea class="form-control" id="note" name="note" wire:model.live="form.note" rows="1"></textarea>
                                @error('form.note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="image">Image</label>
                                <input type="file" class="form-control @error('form.image') is-invalid @enderror" id="image" name="image" wire:model="form.image" accept="image/*">
                                @error('form.image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <label for="required_energy">Required Energy</label>
                                <input type="number" class="form-control @error('form.required_energy') is-invalid @enderror" id="required_energy" name="required_energy" wire:model.live="form.required_energy" autocomplete="off" @if(in_array($form->card_type, ['action_point'])) disabled @endif>
                                @error('form.required_energy')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="action_point_cost">Action Point Cost</label>
                                <input type="number" class="form-control @error('form.action_point_cost') is-invalid @enderror" id="action_point_cost" name="action_point_cost" wire:model.live="form.action_point_cost" autocomplete="off" @if(in_array($form->card_type, ['action_point'])) disabled @endif>
                                @error('form.action_point_cost')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="energy_generation">Energy Generation</label>
                                <input type="number" class="form-control @error('form.energy_generation') is-invalid @enderror" id="energy_generation" name="energy_generation" wire:model.live="form.energy_generation" autocomplete="off" @if(in_array($form->card_type, ['action_point', 'event'])) disabled @endif>
                                @error('form.energy_generation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="battle_power">Battle Power</label>
                                <input type="number" class="form-control @error('form.battle_power') is-invalid @enderror" id="battle_power" name="battle_power" wire:model.live="form.battle_power" autocomplete="off" @if(in_array($form->card_type, ['action_point', 'event'])) disabled @endif>
                                @error('form.battle_power')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="trigger_effect">Trigger Effect</label>
                                <select class="form-select" id="trigger_effect" name="trigger_effect" wire:model.live="form.trigger_effect" @if(!$form->has_trigger) disabled @endif>
                                    <option value="" selected>None</option>
                                    @foreach ($trigger_effects as $trigger_effect)
                                        <option value="{{ $trigger_effect->value }}">{{ $trigger_effect->displayText() }}</option>
                                    @endforeach
                                </select>
                                @error('form.trigger_effect')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="has_conditional_energy_generation" wire:model.live="form.has_conditional_energy_generation" @if(in_array($form->card_type, ['action_point'])) disabled @endif>
                                    <label class="form-check-label" for="has_conditional_energy_generation">Conditional Energy Generation</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="has_raid" wire:model.live="form.has_raid" @if(in_array($form->card_type, ['action_point'])) disabled @endif>
                                    <label class="form-check-label" for="has_raid">Raid</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="has_trigger" wire:model.live="form.has_trigger" @if(in_array($form->card_type, ['action_point'])) disabled @endif>
                                    <label class="form-check-label" for="has_trigger">Trigger</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_release_event_card" wire:model.live="form.is_release_event_card">
                                    <label class="form-check-label" for="is_release_event_card">Release Event</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_super_pre_release_card" wire:model.live="form.is_super_pre_release_card">
                                    <label class="form-check-label" for="is_super_pre_release_card">Super Pre-release</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_rare_battle_card" wire:model.live="form.is_rare_battle_card">
                                    <label class="form-check-label" for="is_rare_battle_card">Rare Battle</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_store_tournament_card" wire:model.live="form.is_store_tournament_card">
                                    <label class="form-check-label" for="is_store_tournament_card">Store Tournament</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_judge_card" wire:model.live="form.is_judge_card" @if(in_array($form->card_type, ['action_point'])) disabled @endif>
                                    <label class="form-check-label" for="is_judge_card">Judge</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_winner_card" wire:model.live="form.is_winner_card" @if(in_array($form->card_type, ['action_point'])) disabled @endif>
                                    <label class="form-check-label" for="is_winner_card">Winner</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_alt_art_card" wire:model.live="form.is_alt_art_card" @if(in_array($form->card_type, ['action_point'])) disabled @endif>
                                    <label class="form-check-label" for="is_alt_art_card">Alt Art</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" wire:click="resetForm">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>