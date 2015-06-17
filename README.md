Chat for Aesop Story Engine
============

[![GitHub license](https://img.shields.io/badge/license-GPLv2-blue.svg)](https://github.com/peiche/ase-chat/blob/master/LICENSE.txt)
[![Build Status](https://travis-ci.org/peiche/ase-chat.svg)](https://travis-ci.org/peiche/ase-chat)
[![Code Climate](https://codeclimate.com/github/peiche/ase-chat/badges/gpa.svg)](https://codeclimate.com/github/peiche/ase-chat)


Stylized conversation content driven by Aesop Story Engine.

A single chat component is one piece of conversation: one chat bubble. Using a single chat bubble as the building block, any number of chat bubble components can comprise the end result. Short or long, it's completely up to you, the content creator.

##Options

Using the component's built-in options, the chat colors can vary on a post-by-post basis. Multiple conversations in a single post can have varied colors, due to the modular nature of the components.

![Component screen 1](http://eichefam.net/assets/chat-1.png)

**Appearance** defines the style of chat bubble. There is a default style, but it's not very interesting. There are options to imitate the appearance of chat styles used by Google Hangouts, Facebook Messenger, and iOS Messaging.

**Width** defines the maximum width of the chat bubble. It will never exceed this value, but it can be shorter, if there is not enough text to fill a single line. Please note that the "px" suffix is already included, so all this field requires is a number.

**Background Color** defines the background color <em>behind</em> the chat bubble. It's always the full width of the screen.

**Chat Color** defines the background color of the chat bubble itself. The bubble arrow also takes on this color.

**Text Color** defines the text color in the chat bubble.

![Component screen 2](http://eichefam.net/assets/chat-2.png)

**Direction** defines where the chat bubble, its arrow, and avatar (optional) come from: left or right.

**Content** defines the text inside the chat bubble. Enter as much or as little as you want!

**Avatar** defines the picture associated with the chat bubble. This is optional.

**Avatar Style** defines the shape of the avatar. By default, it's just a square image. It can be changed to rounded corners (I call this a "squircle") or a circle.

###Required Plugins

####Aesop Story Engine

This plugin builds upon existing functionality provided by [Aesop Story Engine](), and will not function without it.

###Built with Sass

Chat's stylesheet is built using Sass. You’ll find the `/sass` folder in the project, which holds all the components required to compile the stylesheet.

##Installation

###Github

You can download the latest from Github. Follow these steps to activate Cover:

1. Download the [latest release](https://github.com/peiche/ase-chat/releases/latest).
2. In your admin panel, go to **Appearance > Plugins** and click the **Add New** button.
3. Click **Upload Plugin** and **Choose File**, then select the plugins's zip file. Click **Install Now**.
4. Click **Activate**.

##Building

So you want to build the project yourself. Great! Please follow [these directions](building.md).

##FAQ

There's nothing here yet. Ask me something!

##Contribute

If you see something wrong, or you want to improve on what I've got here, feel free to submit an issue or create a pull request.

##Changelog

**1.0.0**

First release.

##License

Chat is [GPL v2.0 or later](LICENSE.txt).

All other resources are licensed as follows:

* TGM Plugin Activation - [GPL v2.0](https://github.com/TGMPA/TGM-Plugin-Activation/blob/develop/LICENSE.md)
