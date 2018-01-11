<template>
    <div>
        <div class="arrow"></div>
        <ul class="ChatLog">
            <li class="ChatLog__entry" v-for="(message, index) in messages" :key="index" :class="[{'ChatLog__entry_mine': message.isMine}, {'ChatLog__entry_button':message.buttons.length}]">
                <img class="ChatLog__avatar" src="/logo.png" />
                <p class="ChatLog__message" v-html="message.text">{{ message.text }}</p>
                <p class="ChatLog__message" v-if="message.buttons.length"><a :href="button.url" class="chatButton" @click="button.payload ? sendMessage(button.payload) : null" v-for="button in message.buttons">{{ button.text }}</a></p>
            </li>
        </ul>

        <input type="text" class="ChatInput" @keyup.enter="sendMessage" v-model="newMessage" placeholder="Type a message">
    </div>
</template>

<script>
    const axios = require('axios');
    const API_ENDPOINT = '/botman';

    export default {
        data() {
            return {
                messages: [],
                newMessage: null
            };
        },

        methods: {
            _addMessage(text, attachment, isMine, buttons=[]) {
                this.messages.push({
                    'isMine': isMine,
                    'user': isMine ? '👨' : '🤖',
                    'text': text,
                    'attachment': attachment || {},
                    'buttons': buttons,
                });
            },

            sendMessage(msg=null) {
                let messageText = '';

                if (typeof(msg) !== "string") {
                  messageText = this.newMessage;
                }
                else {
                  messageText = msg;
                }
                this.newMessage = '';
                if (messageText === 'clear') {
                    this.messages = [];
                    return;
                }

                this._addMessage(messageText, null, true);

                axios.post(API_ENDPOINT, {
                    driver: 'web',
                    userId: 9999999,
                    message: messageText
                }).then(response => {
                    let messages = response.data.messages || [];
                    messages.forEach(msg => {
                        this._addMessage(msg.text, msg.attachment, false);
                        if (typeof(msg.actions) !== 'undefined') {
                          let actions = msg.actions || [];
                          let buttons = [];
                          actions.forEach(act => {
                            if (act.type === 'button') {
                              buttons.push({'text':act.text, 'payload':act.text, 'url':'#'});
                            }

                          });
                          this._addMessage('', {}, false, buttons);

                        }
                        if (msg.type === 'buttons') {
                          //get all buttons
                          let actions = msg.buttons || [];
                          let buttons = [];
                          actions.forEach(act => {
                            if (act.type === 'postback') {
                              buttons.push({'text':act.title, 'payload':act.payload, 'url':'#'});
                            }
                            else if (act.type === 'web_url') {
                              buttons.push({'text':act.title, 'payload':'', 'url':act.url});
                            }

                          });
                          this._addMessage('', {}, false, buttons);

                        }
                    });
                }, response => {

                });
            }
        }
    }
</script>

<style lang="scss">
    input.ChatInput {
        width: 300px;
        height: 25px;
        border-radius: 5px;
        border: none;
        padding: 10px;
        margin-bottom: 10px;

        &:focus {
            outline: none;
        }
    }

    ul.ChatLog {
        list-style: none;
        padding: 0;
    }

    .ChatLog {
        max-width: 20em;
        margin: 0 auto;

        .ChatLog__entry {
            margin: .5em;
        }
    }

    .ChatLog__entry {
        display: flex;
        flex-direction: row;
        align-items: flex-end;
        max-width: 100%;
    }

    .ChatLog__entry.ChatLog__entry_mine {
        flex-direction: row-reverse;

        .ChatLog__message {
            &:before {
                right: -12px;
                bottom: .6em;
                left: auto;
                border: 6px solid transparent;
                border-left-color: #08f;
            }
        }
    }

    .ChatLog__avatar {
        flex-shrink: 0;
        flex-grow: 0;
        z-index: 1;
        height: 50px;
        width: 50px;
        border-radius: 25px;

    }

    .ChatLog__entry.ChatLog__entry_mine
    .ChatLog__avatar,
    .ChatLog__entry.ChatLog__entry_button
    .ChatLog__avatar {
        display: none;
    }

    .ChatLog__entry_button .ChatLog__message {
        min-width: 100%;
        left:-20px;
    }

    .ChatLog__entry .ChatLog__message {
        position: relative;
        margin: 0 12px;

        &:before {
            position: absolute;
            right: auto;
            bottom: .6em;
            left: -12px;
            height: 0;
            content: '';
            border: 6px solid transparent;
            border-right-color: #ddd;
            z-index: 2;
        }
    }

    .ChatLog__entry.ChatLog__entry_button .ChatLog__message::before {
        right: -12px;
        bottom: .6em;
        left: auto;
        border: none;
        border-left-color: #08f;
    }

    .ChatLog__message {
        background-color: #ddd;
        padding: .5em;
        border-radius: 4px;
        font-weight: lighter;
        max-width: 70%;
    }

    .ChatLog__entry.ChatLog__entry_mine .ChatLog__message {
        border-top: 1px solid #07f;
        border-bottom: 1px solid #07f;
        background-color: #08f;
        color: #fff;
    }

    a.chatButton{
     background-color:#5cb85c;
     border:1px solid #4cae4c;
     border-radius:5px;
     color:#fff;
     margin:2px 10px 2px 0;
     padding:5px 10px 5px 10px;
     text-decoration:none;
     display: inline-block;
    }
</style>