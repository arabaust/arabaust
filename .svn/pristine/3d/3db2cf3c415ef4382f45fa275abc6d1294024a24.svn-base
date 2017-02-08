// the semi-colon before function invocation is a safety net against concatenated
// scripts and/or other plugins which may not be closed properly.
;
(function ($, window, document, undefined) {

    "use strict";

    // undefined is used here as the undefined global variable in ECMAScript 3 is
    // mutable (ie. it can be changed by someone else). undefined isn't really being
    // passed in so we can ensure the value of it is truly undefined. In ES5, undefined
    // can no longer be modified.

    // window and document are passed through as local variable rather than global
    // as this (slightly) quickens the resolution process and can be more efficiently
    // minified (especially when both are regularly referenced in your plugin).

    // Create the defaults once
    var pluginName = "addFiles",
        defaults = {
            mediaIndex: 0,
            modal: ''
        };

    // The actual plugin constructor
    function Plugin(element, options) {
        this.element = element;
        // jQuery has an extend method which merges the contents of two or
        // more objects, storing the result in the first object. The first object
        // is generally empty as we don't want to alter the default options for
        // future instances of the plugin
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    // Avoid Plugin.prototype conflicts
    $.extend(Plugin.prototype, {
        init: function () {
            this.$element = $(this.element);
            this.modalId = this.$element.attr('href');
            this.$modal = $(this.modalId);

            var that = this;

            this.settings.modal = this.$modal;
            this.settings.mediaIndex = $('#' + this.settings.tableId + ' > tbody > tr').length;

            if (!$('#' + this.settings.containerId)[0]) {
                this.$element.parent().append('<div id="' + this.settings.containerId + '" class="hidden"></div>');
            } else {
                $('#' + this.settings.tableId + ' > tbody .command-edit').unbind('click').one('click', {
                    settings: that.settings,
                    that: that
                }, this.editRow);
                $('#' + this.settings.tableId + ' > tbody .command-delete').unbind('click').one('click', {settings: that.settings}, this.deleteRow);
            }

            this.$element.on('click', function (e) {
                e.preventDefault();
                that.openModal(that.settings, that.$modal);
            });
            that.$modal.appendTo('body');
        },
        openModal: function (settings, modal) {
            var that = this;

            modal.modal({
                backdrop: 'static',
                keyboard: false
            }).one('shown.bs.modal', function (e) {
                $('button.save-file').one('click', function (e) {
                    e.preventDefault();
                    that.saveData(settings, modal);
                });
            }).one('hidden.bs.modal', function (e) {
                $(this).find('[data-provides="fileinput"]').fileinput('reset');
                $(this).find(':input:not(:button)').val('');
            });
        },
        saveData: function (settings, modal) {
            var inputs = modal.find(':input:not(:button, :hidden, :file)').clone(true),
                fileinput = modal.find(':file'),
                fileinputClone = fileinput.clone();

            fileinput.after(fileinputClone).appendTo('#' + settings.containerId);
            inputs.appendTo('#' + settings.containerId);

            fileinput.attr('name', function (key, attr) {
                return attr.replace(/(\d+)/g, settings.mediaIndex);
            });
            inputs.each(function (index, input) {
                $(input).attr('name', function (key, attr) {
                    return attr.replace(/(\d+)/g, settings.mediaIndex);
                });
            });

            this.addToTable(fileinput, settings);

            settings.mediaIndex++;
            modal.modal('hide');
        },
        addToTable: function (input, settings) {
            var tr = '<tr data-row-id="' + settings.mediaIndex + '">',
                name = $(input).val().replace(/^.*\\/, ""),
                title = $(input).attr('name').replace("filename", "title"),
                code = $(input).attr('name').replace("filename", "code");
            tr += '<td>' + name + '</td>';
            if ($('#' + settings.containerId + ' :input[name="' + title + '"]')[0]) tr += '<td>' + $('#' + settings.containerId + ' :input[name="' + title + '"]').val() + '</td>';
            if ($('#' + settings.containerId + ' :input[name="' + code + '"]')[0]) tr += '<td>' + $('#' + settings.containerId + ' :input[name="' + code + '"]').val() + '</td>';
            tr += '<td><button type="button" class="btn btn-icon command-edit" data-row-id="' + settings.mediaIndex + '" data-toggle="tooltip" data-placement="top" data-original-title="Edit ' + name + '"><span class="md md-edit"></span></button>';
            tr += '<button type="button" class="btn btn-icon command-delete" data-row-id="' + settings.mediaIndex + '" data-toggle="tooltip" data-placement="top" data-original-title="Delete ' + name + '"><span class="md md-delete"></span></button></td>';
            tr += '</tr>';

            $('#' + this.settings.tableId + ' > tbody').append(tr);
            $('#' + this.settings.tableId + ' > tbody .command-edit').unbind('click').one('click', {
                settings: settings,
                that: this
            }, this.editRow);
            $('#' + this.settings.tableId + ' > tbody .command-delete').unbind('click').one('click', {settings: settings}, this.deleteRow);
        },
        editRow: function (e) {
            e.preventDefault();
            var id = $(this).data('row-id'),
                container = $('#' + e.data.settings.containerId),
                inputs = container.find(':input[name*="' + id + '"]').not(':file'),
                fileinput = container.find(':file[name*="' + id + '"]'),
                settings = e.data.settings,
                modal = e.data.settings.modal,
                that = e.data.that;

            inputs.each(function (index, input) {
                $(modal).find(':input[name="' + $(input).attr('name').replace(/(\d+)/g, '0') + '"]').val($(input).val());
            });

            $(modal).find('input[name="' + $(fileinput).attr('name').replace(/(\d+)/g, '0') + '"]').after(fileinput).remove();

            container.find(':input[name*="[' + id + ']"]').remove();
            $('#' + settings.tableId).find('tr[data-row-id="' + id + '"]').remove();

            modal.modal('show').one('shown.bs.modal', function () {
                $('button.save-file').one('click', function (e) {
                    e.preventDefault();
                    that.saveData(settings, modal);
                });
            });
        },
        deleteRow: function (e) {
            e.preventDefault();
            var id = $(this).data('row-id');
            $('#' + e.data.settings.containerId).find(':input[name*="[' + id + ']"]').remove();
            $('#' + e.data.settings.tableId).find('tr[data-row-id="' + id + '"]').remove();
        }
    });

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function (options) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });
    };

})(jQuery, window, document);